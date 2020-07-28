<?php


namespace App\Controller\Dto\ContentCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class EditContentCategoryRequestBody
{

    const
        CONTENT_CATEGORY_ID = "id",
        CONTENT_CATEGORY_PARENT_ID = "content_category_parent_id",
        CONTENT_CATEGORY_ALIAS = "content_category_alias";

    /**
     * @SWG\Property(property=EditContentCategoryRequestBody::CONTENT_CATEGORY_ID, type="integer")
     */
    private $contentCategoryId;

    /**
     * @SWG\Property(property=EditContentCategoryRequestBody::CONTENT_CATEGORY_PARENT_ID, type="integer")
     */
    private $contentCategoryParentId = null;

    /**
     * @SWG\Property(property=EditContentCategoryRequestBody::CONTENT_CATEGORY_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $contentCategoryAlias;

    /**
     * EditContentCategoryRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_CATEGORY_ID])) {
            $this->setContentCategoryId($data[self::CONTENT_CATEGORY_ID]);
        }

        if (isset($data[self::CONTENT_CATEGORY_PARENT_ID])) {
            $this->setContentCategoryParentId($data[self::CONTENT_CATEGORY_PARENT_ID]);
        }

        if (isset($data[self::CONTENT_CATEGORY_ALIAS])) {
            $this->setContentCategoryAlias($data[self::CONTENT_CATEGORY_ALIAS]);
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

    public function getContentCategoryParentId()
    {
        return $this->contentCategoryParentId;
    }

    public function setContentCategoryParentId($contentCategoryParentId)
    {
        $this->contentCategoryParentId = $contentCategoryParentId;
    }

    public function getContentCategoryAlias()
    {
        return $this->contentCategoryAlias;
    }

    public function setContentCategoryAlias($contentCategoryAlias)
    {
        $this->contentCategoryAlias = $contentCategoryAlias;
    }
}