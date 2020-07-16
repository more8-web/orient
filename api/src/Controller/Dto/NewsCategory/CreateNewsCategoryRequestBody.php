<?php


namespace App\Controller\Dto\NewsCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewsCategoryRequestBody
{

    const
        NEWS_CATEGORY_ALIAS = "news_category_alias",
        NEWS_CATEGORY_PARENT_ID = "news_category_parent_id";

    /**
     * @SWG\Property(property=CreateNewsCategoryRequestBody::NEWS_CATEGORY_PARENT_ID, type="integer")
     */
    private $newsCategoryParentId;

    /**
     * @SWG\Property(property=CreateNewsCategoryRequestBody::NEWS_CATEGORY_ALIAS, type="string")
     */
    private $newsCategoryAlias;

    public function __construct(array $data)
    {
        if (isset($data[self::NEWS_CATEGORY_PARENT_ID])) {
            $this->setNewsCategoryParentId($data[self::NEWS_CATEGORY_PARENT_ID]);
        }

        if (isset($data[self::NEWS_CATEGORY_ALIAS])) {
            $this->setNewsCategoryAlias($data[self::NEWS_CATEGORY_ALIAS]);
        }
    }

    public function asArray()
    {
        return [
            self::NEWS_CATEGORY_PARENT_ID => $this->getNewsCategoryParentId(),
            self::NEWS_CATEGORY_ALIAS => $this->getNewsCategoryAlias(),
        ];
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