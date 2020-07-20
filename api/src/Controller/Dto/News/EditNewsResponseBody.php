<?php


namespace App\Controller\Dto\News;

use App\Entity\News;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class EditNewsResponseBody
{
    const
            NEWS_ID = "id",
            NEWS_ALIAS = "news_alias",
            NEWS_STATUS = "news_status";

    /**
     * @SWG\Property(property=EditNewsResponseBody::NEWS_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=EditNewsResponseBody::NEWS_ALIAS, type="string")
     */
    private $newsAlias;

    /**
     * @SWG\Property(property=EditNewsResponseBody::NEWS_STATUS, type="string")
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