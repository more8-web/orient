<?php

namespace App\Services\Auth;

use App\Entity\User;
use App\Exceptions\LoginException;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Exception;


class LoginService
{
    /** @var UserRepository */
    protected $repo;

    /**
     * @var TokenService
     */
    protected $token;

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
    public function login($email, $password)
    {
        $user = $this->repo->findByEmail($email);
        if(is_null($user)) {
            throw new LoginException();
        }

        if(!$this->repo->isPasswordValid($user, $password)) {
            throw new LoginException();
        }

        return $this->token->provideToken($user);
    }

}