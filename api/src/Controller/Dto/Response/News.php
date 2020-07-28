<?php


namespace App\Controller\Dto\Response;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class News
{
    const
            NEWS_ID = "news_id",
            NEWS_ALIAS = "news_alias",
            NEWS_STATUS = "news_status";

    /**
     * @SWG\Property(property=NewsResponse::NEWS_ID, type="integer")
     */
    private $newsId;

    /**
     * @SWG\Property(property=NewsResponse::NEWS_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $newsAlias;

    /**
     * @SWG\Property(property=NewsResponse::NEWS_STATUS, type="string")
     * @Assert\NotBlank()
     */
    private $newsStatus;

    /**
     * NewsResponse constructor.
     * @param \App\Entity\News $news
     */
    public function __construct(\App\Entity\News $news)
    {
        $this->setNewsId($news->getId());
        $this->setNewsAlias($news->getNewsAlias());
        $this->setNewsStatus($news->getNewsStatus());
    }

    public function asArray()
    {
        return [
            self::NEWS_ID => $this->getNewsId(),
            self::NEWS_ALIAS => $this->getNewsAlias(),
            self::NEWS_STATUS => $this->getNewsStatus()
        ];
    }

    /**
     * @return mixed
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * @param $newsId
     */
    public function setNewsId($newsId): void
    {
        $this->newsId = $newsId;
    }

    /**
     * @return mixed
     */
    public function getNewsAlias()
    {
        return $this->newsAlias;
    }

    /**
     * @param mixed $newsAlias
     */
    public function setNewsAlias($newsAlias): void
    {
        $this->newsAlias = $newsAlias;
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
}