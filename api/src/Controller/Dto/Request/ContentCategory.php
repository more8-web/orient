<?php

namespace App\Controller\Dto\Request;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class ContentCategory
{
    const
        CONTENT_CATEGORY_PARENT_ID = "content_category_parent_id",
        CONTENT_CATEGORY_ALIAS = "content_category_alias";

    /**
     * @SWG\Property(property=ContentCategory::CONTENT_CATEGORY_PARENT_ID, type="integer")
     */
    private $contentCategoryParentId = null;

    /**
     * @SWG\Property(property=ContentCategory::CONTENT_CATEGORY_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $contentCategoryAlias;

    /**
     * ContentCategory constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_CATEGORY_PARENT_ID])) {
            $this->setContentCategoryParentId($data[self::CONTENT_CATEGORY_PARENT_ID]);
        }

        if (isset($data[self::CONTENT_CATEGORY_ALIAS])) {
            $this->setContentCategoryAlias($data[self::CONTENT_CATEGORY_ALIAS]);
        }
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