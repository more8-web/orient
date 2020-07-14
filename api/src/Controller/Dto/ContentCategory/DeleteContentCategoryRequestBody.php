<?php


namespace App\Controller\Dto\ContentCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteContentCategoryRequestBody
{
    const
        CONTENT_CATEGORY_ID = "id";

    /**
     * @SWG\Property(property=DeleteContentCategoryRequestBody::CONTENT_CATEGORY_ID, type="integer")
     */
    private $contentCategoryId;

    /**
     * EditContentCategoryRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_CATEGORY_ID])) {
            $this->setContentCategoryId($data[self::CONTENT_CATEGORY_ID]);
        }
    }

    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    public function setContentCategoryId($contentCategoryId)
    {
        $this->contentCategoryId = $contentCategoryId;
    }

}