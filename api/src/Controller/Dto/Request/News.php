<?php

namespace App\Controller\Dto\Request;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class News
{
    const
        NEWS_ALIAS = "news_alias",
        NEWS_STATUS = "news_status";

    /**
     * @SWG\Property(property=News::NEWS_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $newsAlias;

    /**
     * @SWG\Property(property=News::NEWS_STATUS, type="string")
     * @Assert\NotBlank()
     */
    private $newsStatus;

    /**
     * News constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
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
}