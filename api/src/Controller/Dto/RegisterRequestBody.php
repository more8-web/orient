<?php

namespace App\Controller\Dto;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class RegisterRequestBody
{
    const
        PROPERTY_EMAIL = "email",
        PROPERTY_PASSWORD = "password";

    /**
     * @SWG\Property(type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
     */
    private $email;

    /**
     * @SWG\Property(type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 8,
     *      max = 16,
     *      minMessage = "Ваш пароль должно быть как минимум {{ limit }} символов",
     *      maxMessage = "Ваш пароль не должен быть длиннее {{ limit }} символов"
     * )
     */
    private $password;

    /**
     * RegisterRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::PROPERTY_EMAIL])) {
            $this->setEmail($data[self::PROPERTY_EMAIL]);
        }

        if (isset($data[self::PROPERTY_PASSWORD])) {
            $this->setPassword($data[self::PROPERTY_PASSWORD]);
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}