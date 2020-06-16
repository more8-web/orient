<?php


namespace App\Controller\Dto;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class PasswordResetRequestBody
{

    const
        PROPERTY_EMAIL = "email",
        PROPERTY_OLD_PASSWORD = "old_password",
        PROPERTY_NEW_PASSWORD = "new_password",
        PROPERTY_DOUBLED_NEW_PASSWORD = "doubled_new_password";

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
     *      minMessage = "Ваш новый пароль должен быть как минимум {{ limit }} символов",
     *      maxMessage = "Ваш новый пароль не должен быть длиннее {{ limit }} символов"
     * )
     */
    private $newPassword;

    /**
     * @var
     */
    private $doubledNewPassword;

    /**
     * @var
     */
    private $oldPassword;

    /**
     * PasswordResetRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::PROPERTY_EMAIL])) {
            $this->setEmail($data[self::PROPERTY_EMAIL]);
        }

        if (isset($data[self::PROPERTY_OLD_PASSWORD])) {
            $this->setOldPassword($data[self::PROPERTY_OLD_PASSWORD]);
        }

        if (isset($data[self::PROPERTY_NEW_PASSWORD])) {
            $this->setNewPassword($data[self::PROPERTY_NEW_PASSWORD]);
        }

        if (isset($data[self::PROPERTY_DOUBLED_NEW_PASSWORD])) {
            $this->setDoubledNewPassword($data[self::PROPERTY_DOUBLED_NEW_PASSWORD]);
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
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @param $oldPassword
     */
    public function setOldPassword($oldPassword): void
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @return mixed
     */
    public function getDoubledNewPassword()
    {
        return $this->doubledNewPassword;
    }

    /**
     * @param mixed $doubledNewPassword
     */
    public function setDoubledNewPassword($doubledNewPassword): void
    {
        $this->doubledNewPassword = $doubledNewPassword;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword): void
    {
        $this->newPassword = $newPassword;
    }

}