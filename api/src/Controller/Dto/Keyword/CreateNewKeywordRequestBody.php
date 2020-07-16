<?php


namespace App\Controller\Dto\Keyword;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewKeywordRequestBody
{

    const
        KEYWORD_VALUE = "keyword_value";

    /**
     * @SWG\Property(property=CreateNewKeywordRequestBody::KEYWORD_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $keywordValue;

    /**
     * CreateNewKeywordRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::KEYWORD_VALUE])) {
            $this->setKeywordValue($data[self::KEYWORD_VALUE]);
        }
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