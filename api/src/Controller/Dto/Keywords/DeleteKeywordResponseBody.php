<?php


namespace App\Controller\Dto\Keywords;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteKeywordResponseBody
{
    const MESSAGE = "message";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $message;

    public function __construct($message)
    {
        $this->setMessage($message);
    }

    public function asArray()
    {
        return [
            self::MESSAGE => $this->getMessage()
        ];
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }


}