<?php


namespace App\Controller\Dto\News;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class EditNewsRequestBody
{

    const
        NEWS_ID = "id",
        NEWS_ALIAS = "news_alias",
        NEWS_STATUS = "news_status";

    /**
     * @SWG\Property(property=EditNewsRequestBody::NEWS_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @SWG\Property(property=EditNewsRequestBody::NEWS_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $newsAlias;

    /**
     * @SWG\Property(property=EditNewsRequestBody::NEWS_STATUS, type="string")
     * @Assert\NotBlank()
     */
    private $newsStatus;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::NEWS_ID])) {
            $this->id = $data[self::NEWS_ID];
        }

        if (isset($data[self::NEWS_ALIAS])) {
            $this->setNewsAlias($data[self::NEWS_ALIAS]);
        }

        if (isset($data[self::NEWS_STATUS])) {
            $this->setNewsStatus($data[self::NEWS_STATUS]);
        }
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}