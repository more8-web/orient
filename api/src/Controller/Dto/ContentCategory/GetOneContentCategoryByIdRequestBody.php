<?php


namespace App\Controller\Dto\ContentCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetOneContentCategoryByIdRequestBody
{

    const
        CONTENT_CATEGORY_ID = "id";

    /**
     * @SWG\Property(type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_CATEGORY_ID])) {
            $this->setId($data[self::CONTENT_CATEGORY_ID]);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}