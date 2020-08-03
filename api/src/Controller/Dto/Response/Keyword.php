<?php

namespace App\Controller\Dto\Response;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class Keyword
{
    const
        KEYWORD_ID = "keyword_id",
        KEYWORD_VALUE = "keyword_value";

    /**
     * @SWG\Property(property=Keyword::KEYWORD_ID, type="integer")
     */
    private $keywordId;

    /**
     * @SWG\Property(property=Keyword::KEYWORD_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $keywordValue;

    public function __construct(\App\Entity\Keyword $keyword)
    {
        $this->setKeywordId($keyword->getId());
        $this->setKeywordValue($keyword->getKeywordValue());
    }

    public function asArray(): array
    {
        return [
            self::KEYWORD_ID => $this->getKeywordId(),
            self::KEYWORD_VALUE => $this->getKeywordValue(),
        ];
    }

    /**
     * @return int|null
     */
    public function getKeywordId(): ?int
    {
        return $this->keywordId;
    }

    /**
     * @param mixed $keywordId
     */
    public function setKeywordId($keywordId): void
    {
        $this->keywordId = $keywordId;
    }

    /**
     * @return mixed
     */
    public function getKeywordValue()
    {
        return $this->keywordValue;
    }

    /**
     * @param mixed $keywordValue
     */
    public function setKeywordValue($keywordValue): void
    {
        $this->keywordValue = $keywordValue;
    }
}