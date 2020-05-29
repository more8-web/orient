<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    private $email;
    private $password;
    private $confirmationCode;
    private $updatedAt;
    private $createdAt;
    private $lastLoginAt;


    public function getId(): ?int
    {
        return $this->id;
    }

    
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    
    public function getPassword(): ?string
    {
        return $this->password;
    }

    
    public function getConfirmationCode(): ?string
    {
        return $this->confirmationCode;
    }

    
    public function getUpdatedAt(): ?date
    {
        return $this->updatedAt;
    }

    
    public function getCreatedAt(): ?date
    {
        return $this->createdAt;
    }

    
    public function getLastLoginAt(): ?date
    {
        return $this->lastLoginAt;
    }
}
