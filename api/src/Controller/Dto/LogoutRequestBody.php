<?php


namespace App\Controller\Dto;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class LogoutRequestBody
{
    const  PROPERTY_EMAIL = "email";

    /**
     * @SWG\Property(type="string")
     *
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * RegisterRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::PROPERTY_EMAIL])) {
            $this->setEmail($data[self::PROPERTY_EMAIL]);
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

}