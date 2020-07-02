<?php


namespace App\Services\Auth;


use App\Exceptions\NotFoundEmailException;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Exception;

/**
 * @method login($getEmail, $getPassword)
 */
class PasswordResetCompleteService
{
    /** @var UserRepository */
    protected $repo;
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
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function passwordResetComplete(string $confirmationCode, string $newPassword)
    {

            $user = $this->repo->findUserByConfirmationCode($confirmationCode);
            if (is_null($user)) {
                throw new NotFoundEmailException();
            }

            $user->setPassword($newPassword);
            $user->setConfirmationCode("");

            $this->repo->flush();

            return $this->token->provideToken($user);

    }
}