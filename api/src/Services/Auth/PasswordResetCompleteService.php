<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\NotFoundEmailException;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Exception;

class PasswordResetCompleteService
{
    /** @var UserRepository */
    protected $repo;

    /** @var TokenService */
    protected $token;

    /**
     * PasswordResetCompleteService constructor.
     * @param UserRepository $repo
     * @param TokenService $token
     */
    public function __construct(UserRepository $repo, TokenService $token)
    {
        $this->repo = $repo;
        $this->token = $token;
    }

    /**
     * @param $confirmationCode
     * @param $newPassword
     * @return string
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Exception
     */
    public function passwordResetComplete($confirmationCode, $newPassword)
    {
        $user = $this->repo->findUserByConfirmationCode($confirmationCode);
        if (is_null($user)) {
            throw new NotFoundEmailException();
        }

        $user->clearConfirmationCode();
        $this->repo->setPassword($user, $newPassword);
        $this->repo->flush();

        return $this->token->provideToken($user);
    }
}