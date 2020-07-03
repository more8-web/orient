<?php


namespace App\Services\Auth;


use App\Exceptions\NotFoundEmailException;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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

            $user->setPassword($newPassword);
            $user->setConfirmationCode("");

            $this->repo->flush();

            return $this->token->provideToken($user);

    }
}