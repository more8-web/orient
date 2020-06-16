<?php


namespace App\Security;

use App\Controller\Dto\PasswordResetRequestBody;
use App\Entity\User;
use App\Repository\UserRepository;
use Exception;

class PasswordService
{
    /** @var UserRepository */
    protected $repo;

    protected $passwordResetRequestBody

    public function __construct(UserRepository $repo, PasswordResetRequestBody $passwordResetRequestBody)
    {
        $this->repo = $repo;
        $this->
    }

    public function isEqualPasswords($newPassword, $doubledNewPassword)
    {
        if($this->newPassword === $this->doubledNewPassword){
            return $newPassword;
        }
    }

}