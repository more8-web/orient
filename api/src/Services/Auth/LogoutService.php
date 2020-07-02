<?php

namespace App\Services\Auth;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\TokenService;
use Exception;


class LogoutService
{
    /** @var UserRepository */
    protected $repo;
    protected $token;

    public function __construct(UserRepository $repo, TokenService $token)
    {
        $this->repo = $repo;
        $this->token = $token;
    }

    /**
     * @param $email
     */
    public function logout($email)
    {
        $user = $this->repo->findByEmail($email);
        $this->token->destroyPublicKey($user);

    }

}
