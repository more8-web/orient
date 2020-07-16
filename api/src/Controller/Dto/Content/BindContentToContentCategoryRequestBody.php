<?php


namespace App\Controller\Dto\Content;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class BindContentToContentCategoryRequestBody
{

    const
        CONTENT_ID = "content_id",
        CONTENT_CATEGORY_ID = "content_category_id";

    /**
     * @SWG\Property(type="integer")
     */
    private $contentId;

    /**
     * @SWG\Property(type="integer")
     */
    private $contentCategoryId;

    /**
     * BindContentToContentCategoryRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_ID])) {
            $this->setContentId($data[self::CONTENT_ID]);
        }
        if (isset($data[self::CONTENT_CATEGORY_ID])) {
            $this->setContentCategoryId($data[self::CONTENT_CATEGORY_ID]);
        }
    }

    /**
     * @return mixed
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * @param mixed $contentId
     */
    public function setContentId($contentId): void
    {
        $this->contentId = $contentId;
    }

    /**
     * @return mixed
     */
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    /**
     * @param mixed $contentCategoryId
     */
    public function setContentCategoryId($contentCategoryId): void
    {
        $this->contentCategoryId = $contentCategoryId;
    }
}