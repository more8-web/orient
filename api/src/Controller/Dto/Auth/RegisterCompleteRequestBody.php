<?php


namespace App\Controller\Dto\Auth;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */

class RegisterCompleteRequestBody
{

    const
        CONFIRMATION_CODE = "confirmation_code";

    /**
     * @SWG\Property(property=RegisterCompleteRequestBody::CONFIRMATION_CODE, type="string")
     * @Assert\NotBlank()
     * @var string
     */
    private $confirmationCode;

    /**
     * RegisterCompleteRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONFIRMATION_CODE])) {
            $this->setConfirmationCode($data[self::CONFIRMATION_CODE]);
        }

    }

    /**
     * @return mixed
     */
    public function getConfirmationCode()
    {
        return $this->confirmationCode;
    }

    /**
     * @param mixed $confirmationCode
     */
    public function setConfirmationCode($confirmationCode): void
    {
        $this->confirmationCode = $confirmationCode;
    }

}