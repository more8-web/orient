<?php


namespace App\Controller\Dto\NewsCategory;

use App\Entity\NewsCategory;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewsCategoryResponseBody
{
    const
            NEWS_CATEGORY_ID = "id",
            NEWS_CATEGORY_PARENT_ID = "news_category_parent_id",
            NEWS_CATEGORY_ALIAS = "news_category_alias";

    /**
     * @SWG\Property(property=CreateNewsCategoryResponseBody::NEWS_CATEGORY_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @SWG\Property(property=CreateNewsCategoryResponseBody::NEWS_CATEGORY_PARENT_ID, type="integer")
     */
    private $parentId;

    /**
     * @SWG\Property(property=CreateNewsCategoryResponseBody::NEWS_CATEGORY_ALIAS, type="string")
     */
    private $newsCategoryAlias;

    public function __construct(NewsCategory $newsCategory)
    {
        $this->id = $newsCategory->getNewsCategoryId();
        $this->setParentId($newsCategory->getNewsCategoryParentId());
        $this->setNewsCategoryAlias($newsCategory->getNewsCategoryAlias());
    }

    public function asArray()
    {
        return [
            self::NEWS_CATEGORY_ID => $this->getId(),
            self::NEWS_CATEGORY_PARENT_ID => $this->getParentId(),
            self::NEWS_CATEGORY_ALIAS => $this->getNewsCategoryAlias(),
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     */
    public function setParentId($parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * @return mixed
     */
    public function getNewsCategoryAlias()
    {
        return $this->newsCategoryAlias;
    }

    /**
     * @param mixed $newsCategoryAlias
     */
    public function setNewsCategoryAlias($newsCategoryAlias): void
    {
        $this->newsCategoryAlias = $newsCategoryAlias;
    }
}