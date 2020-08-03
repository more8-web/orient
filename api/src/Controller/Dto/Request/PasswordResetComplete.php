<?php


namespace App\Controller\Dto\Request;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */

class PasswordResetComplete
{

    const
        CONFIRMATION_CODE = "confirmation_code",
        NEW_PASSWORD = "new_password";

    /**
     * @SWG\Property(property=PasswordResetComplete::CONFIRMATION_CODE, type="string")
     * @Assert\NotBlank()
     * @var string
     */
    private $confirmationCode;

    /**
     * @SWG\Property(property=PasswordResetComplete::NEW_PASSWORD, type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 8,
     *      max = 16,
     *      minMessage = "Ваш пароль должно быть как минимум {{ limit }} символов",
     *      maxMessage = "Ваш пароль не должен быть длиннее {{ limit }} символов"
     * )
     */
    private $newPassword;

    /**
     * PasswordResetComplete constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONFIRMATION_CODE])) {
            $this->setConfirmationCode($data[self::CONFIRMATION_CODE]);
        }

        if (isset($data[self::NEW_PASSWORD])) {
            $this->setNewPassword($data[self::NEW_PASSWORD]);
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
     * @param mixed
     */
    public function setConfirmationCode($confirmationCode)
    {
        $this->confirmationCode = $confirmationCode;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param $newPassword
     */
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }


}