<?php

namespace App\Services\Auth;

use App\Entity\User;
use App\Entity\UserRole;
use App\Exceptions\BadConfirmationCodeException;
use App\Exceptions\DatabaseException;
use App\Repository\UserRepository;
use Doctrine\DBAL\Exception\{ConnectionException};
use Doctrine\ORM\ORMException;


class RegisterCompleteService
{
    /** @var UserRepository */
    protected $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;

    }

    /**
     * @param $confirmationCode
     * @return User
     */
    public function registerComplete($confirmationCode): User
    {
        try {
            $user = $this->repo->findUserByConfirmationCode($confirmationCode);
            if (is_null($user)) {
                throw new BadConfirmationCodeException();
            }

            $user->addRoles(UserRole::USER);
            $this->repo->flush();
        } catch (ORMException | ConnectionException $e) {
            throw (new DatabaseException())->setDebugInfo($e->getMessage());
        }

        return $user;
    }

}