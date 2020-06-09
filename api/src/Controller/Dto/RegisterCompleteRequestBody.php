<?php


namespace App\Controller\Dto;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */

class RegisterCompleteRequestBody
{

    const
        EMAIL_CODE = "email_code";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    private $emailCode;

    /**
     * RegisterCompleteRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::EMAIL_CODE])) {
            $this->setEmailCode($data[self::EMAIL_CODE]);
        }

    }

    /**
     * @return mixed
     */
    public function getEmailCode()
    {
        return $this->emailCode;
    }

    /**
     * @param mixed $emailCode
     */
    public function setEmailCode($emailCode): void
    {
        $this->emailCode = $emailCode;
    }

}