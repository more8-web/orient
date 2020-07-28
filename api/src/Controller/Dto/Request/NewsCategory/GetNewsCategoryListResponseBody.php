<?php


namespace App\Controller\Dto\NewsCategory;

use App\Entity\NewsCategory;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class GetNewsCategoryListResponseBody
{
    const
        NEWS_CATEGORY_ID = "id",
        NEWS_CATEGORY_ALIAS = "news_category_alias";

    /**
     * @SWG\Property(property=GetNewsCategoryListResponseBody::NEWS_CATEGORY_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=GetNewsCategoryListResponseBody::NEWS_CATEGORY_ALIAS, type="string")
     */
    private $newsCategoryAlias;

    public function __construct(NewsCategory $newsCategory)
    {
        $this->id = $newsCategory->getNewsCategoryId();
        $this->setNewsCategoryAlias($newsCategory->getNewsCategoryAlias());
    }

    public function asArray(): array
    {
        return [
            self::NEWS_CATEGORY_ID => $this->getId(),
            self::NEWS_CATEGORY_ALIAS => $this->getNewsCategoryAlias(),
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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