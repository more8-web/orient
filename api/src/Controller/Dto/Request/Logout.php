<?php


namespace App\Controller\Dto\Request;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class Logout
{
    const  PROPERTY_EMAIL = "email";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
     */
    private $email;

    /**
     * Logout constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::PROPERTY_EMAIL])) {
            $this->setEmail($data[self::PROPERTY_EMAIL]);
        }

    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

}