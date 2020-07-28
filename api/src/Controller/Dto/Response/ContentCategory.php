<?php


namespace App\Controller\Dto\Response;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class ContentCategory
{
    const
        CONTENT_CATEGORY_ID = "content_category_id",
        CONTENT_CATEGORY_PARENT_ID = "content_category_parent_id",
        CONTENT_CATEGORY_ALIAS = "content_category_alias";

    /**
     * @SWG\Property(property=ContentCategoryResponse::CONTENT_CATEGORY_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $contentCategoryId;

    /**
     * @SWG\Property(property=ContentCategoryResponse::CONTENT_CATEGORY_PARENT_ID, type="integer")
     */
    private $contentCategoryParentId = null;

    /**
     * @SWG\Property(property=ContentCategoryResponse::CONTENT_CATEGORY_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $contentCategoryAlias;

    /**
     * ContentCategoryResponse constructor.
     * @param \App\Entity\ContentCategory $category
     */
    public function __construct(\App\Entity\ContentCategory $category)
    {
        $this->setContentCategoryId($category->getId());
        $this->setContentCategoryParentId($category->getContentCategoryParentId());
        $this->setContentCategoryAlias($category->getContentCategoryAlias());
    }

    public function asArray(): array
    {
        return [
            self::CONTENT_CATEGORY_ID => $this->getContentCategoryId(),
            self::CONTENT_CATEGORY_PARENT_ID => $this->getContentCategoryParentId(),
            self::CONTENT_CATEGORY_ALIAS => $this->getContentCategoryAlias(),
        ];
    }

    /**
     * @return int
     */
    public function getContentCategoryId()
    {
        return $this->contentCategoryId;
    }

    /**
     * @param int $contentCategoryId
     */
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