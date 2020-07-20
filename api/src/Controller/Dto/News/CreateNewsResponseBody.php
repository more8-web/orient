<?php


namespace App\Controller\Dto\News;

use App\Entity\News;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewsResponseBody
{
    const   NEWS_ID = "id",
            NEWS_ALIAS = "news_alias",
            NEWS_STATUS = "news_status";

    /**
     * @SWG\Property(property=CreateNewsResponseBody::NEWS_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=CreateNewsResponseBody::NEWS_ALIAS, type="string")
     */
    private $newsAlias;

    /**
     * @SWG\Property(property=CreateNewsResponseBody::NEWS_STATUS, type="string")
     */
    private $newsStatus;

    public function __construct(News $news)
    {
        $this->id = $news->getId();
        $this->setNewsAlias($news->getNewsAlias());
        $this->setNewsStatus($news->getNewsStatus());
    }

    public function asArray()
    {
        return [
            self::NEWS_ID => $this->getId(),
            self::NEWS_ALIAS => $this->getNewsAlias(),
            self::NEWS_STATUS => $this->getNewsStatus(),
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
     * @param mixed $newsAlias
     * @return CreateNewsResponseBody
     */
    public function setNewsAlias($newsAlias)
    {
        $this->newsAlias = $newsAlias;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNewsStatus()
    {
        return $this->newsStatus;
    }

    /**
     * @param mixed $newsStatus
     */
    public function setNewsStatus($newsStatus): void
    {
        $this->newsStatus = $newsStatus;
    }

    /**
     * @return mixed
     */
    public function getNewsAlias()
    {
        return $this->newsAlias;
    }
}