<?php


namespace App\Controller\Dto\Auth;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class LogoutResponseBody
{
    const PROPERTY_TOKEN = "token";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $token;

    public function __construct($token)
    {
        $this->setToken($token);
    }

    public function asArray()
    {
        return [
            self::PROPERTY_TOKEN => $this->getToken()
        ];
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

}