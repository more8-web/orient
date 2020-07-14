<?php


namespace App\Controller\Dto\NewsCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetOneCategoryResponseBody
{
    const NEWS_ID = "news_id";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $newsId;

    public function __construct($newsId)
    {
        $this->setNewsId($newsId);
    }

    public function asArray()
    {
        return [
            self::NEWS_ID => $this->getNewsId()
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
     * @param mixed $newsId
     */
    public function setNewsId($newsId): void
    {
        $this->newsId = $newsId;
    }


}