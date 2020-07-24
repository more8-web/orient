<?php


namespace App\Controller\Dto\Entities;

use App\Entity\News;
use App\Entity\NewsCategory;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class NewsCategoryResponse
{
    const
            NEWS_CATEGORY_ID = "news_category_id",
            NEWS_CATEGORY_PARENT_ID = "news_category_parent_id",
            NEWS_CATEGORY_ALIAS = "news_category_alias";

    /**
     * @SWG\Property(property=NewsCategoryResponse::NEWS_CATEGORY_ID, type="integer")
     */
    private $newsCategoryId;

    /**
     * @SWG\Property(property=NewsCategoryResponse::NEWS_CATEGORY_PARENT_ID, type="integer")
     */
    private $newsCategoryParentId;

    /**
     * @SWG\Property(property=GetNewsListResponseBody::NEWS_CATEGORY_ALIAS, type="string")
     */
    private $newsCategoryAlias;

    /**
     * NewsCategoryResponse constructor.
     * @param NewsCategory $newsCategory
     */
    public function __construct(NewsCategory $newsCategory)
    {
        $this->setNewsCategoryId($newsCategory->getNewsCategoryId());
        $this->setNewsCategoryParentId($newsCategory->getNewsCategoryParentId());
        $this->setNewsCategoryAlias($newsCategory->getNewsCategoryAlias());
    }

    public function asArray()
    {
        return [
            self::NEWS_CATEGORY_ID => $this->getNewsCategoryId(),
            self::NEWS_CATEGORY_PARENT_ID => $this->getNewsCategoryParentId(),
            self::NEWS_CATEGORY_ALIAS => $this->getNewsCategoryAlias(),
        ];
    }

    /**
     * @return mixed
     */
    public function getNewsCategoryId()
    {
        return $this->newsCategoryId;
    }

    /**
     * @param mixed $newsCategoryId
     */
    public function setNewsCategoryId($newsCategoryId): void
    {
        $this->newsCategoryId = $newsCategoryId;
    }

    /**
     * @return mixed
     */
    public function getNewsCategoryParentId()
    {
        return $this->newsCategoryParentId;
    }

    /**
     * @param mixed $newsCategoryParentId
     */
    public function setNewsCategoryParentId($newsCategoryParentId): void
    {
        $this->newsCategoryParentId = $newsCategoryParentId;
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