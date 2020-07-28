<?php


namespace App\Controller\Dto\Content;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteContentRequestBody
{

    const
        CONTENT_ID = "id";

    /**
     * @SWG\Property(type="integer")
     */
    private $id;

    /**
     * DeleteContentRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_ID])) {
            $this->id = $data[self::CONTENT_ID];
        }
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}