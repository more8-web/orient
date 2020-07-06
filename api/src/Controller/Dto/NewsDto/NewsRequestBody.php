<?php


namespace App\Controller\Dto\NewsDto;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class NewsRequestBody
{

    const
        USER_TOKEN = "token";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $token;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::USER_TOKEN])) {
            $this->setToken($data[self::USER_TOKEN]);
        }
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}