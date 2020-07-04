<?php

namespace App\Services\Auth;

use App\Entity\UserRole;
use App\Exceptions\BadConfirmationCodeException;
use App\Exceptions\DatabaseException;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Doctrine\ORM\ORMException;
use Exception;

class RegisterCompleteService
{
    /** @var UserRepository */
    protected $repo;

    /** @var TokenService */
    protected $token;

    public function __construct(UserRepository $repo, TokenService $token)
    {
        $this->repo = $repo;
        $this->token = $token;
    }

    /**
     * @param $confirmationCode
     * @return string
     * @throws Exception
     */
    public function registerComplete($confirmationCode): string
    {
        try {
            $user = $this->repo->findUserByConfirmationCode($confirmationCode);
            if (is_null($user)) {
                throw new BadConfirmationCodeException();
            }

            $user->setRoles(UserRole::USER);
            $user->clearConfirmationCode();
            $this->repo->flush();
        } catch (ORMException $e) {
            throw (new DatabaseException())->setDebugInfo($e->getMessage());
        }

        return $this->token->provideToken($user);
    }

}