<?php


namespace App\Controller\Dto\Keyword;

use App\Entity\Keyword;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class GetOneKeywordByIdResponseBody
{
    const
        KEYWORD_ID = "id",
        KEYWORD_VALUE = "keyword_value";

    /**
     * @SWG\Property(property=EditKeywordResponseBody::KEYWORD_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=EditKeywordResponseBody::KEYWORD_VALUE, type="string")
     */
    private $keywordValue;

    public function __construct(Keyword $keyword)
    {
        $this->id = $keyword->getId();
        $this->setKeywordValue($keyword->getKeywordValue());
    }

    public function asArray(): array
    {
        return [
            self::KEYWORD_ID => $this->getId(),
            self::KEYWORD_VALUE => $this->getKeywordValue(),
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