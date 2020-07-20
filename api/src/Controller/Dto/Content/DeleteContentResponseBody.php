<?php


namespace App\Controller\Dto\Content;

use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class DeleteContentResponseBody
{
    const MESSAGE = "message";

    /**
     * @SWG\Property(type="string")
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