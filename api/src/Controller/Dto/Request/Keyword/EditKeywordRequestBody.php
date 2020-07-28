<?php


namespace App\Controller\Dto\Keyword;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class EditKeywordRequestBody
{

    const
        KEYWORD_ID = "id",
        KEYWORD_VALUE = "keyword_value";

    /**
     * @SWG\Property(property=EditKeywordRequestBody::KEYWORD_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=EditKeywordRequestBody::KEYWORD_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $keywordValue;

    /**
     * EditKeywordRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::KEYWORD_ID])) {
            $this->id = ($data[self::KEYWORD_ID]);
        }
        if (isset($data[self::KEYWORD_VALUE])) {
            $this->setKeywordValue($data[self::KEYWORD_VALUE]);
        }
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getKeywordValue()
    {
        return $this->keywordValue;
    }

    /**
     * @param string $keywordValue
     */
    public function setKeywordValue($keywordValue): void
    {
        $this->keywordValue = $keywordValue;
    }


}