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
     * @param $email
     * @param $password
     * @return string
     * @throws Exception
     */
    public function passwordResetComplete($email, $password)
    {

            $user = $this->repo->findByEmail($email);
            if (is_null($user)) {
                throw new NotFoundEmailException();
            }

            $user->setPassword($password);

            $this->repo->flush();

            return $this->token->provideToken($user);

    }
}