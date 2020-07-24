<?php


namespace App\Controller\Dto\HtmlTag;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewHtmlTagRequestBody
{

    const
        HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=CreateNewHtmlTagRequestBody::HTML_TAG_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $htmlTagValue;

    /**
     * CreateNewHtmlTagRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::HTML_TAG_VALUE])) {
            $this->setHtmlTagValue($data[self::HTML_TAG_VALUE]);
        }
    }

    /**
     * @return mixed
     */
    public function getHtmlTagValue()
    {
        return $this->htmlTagValue;
    }

    /**
     * @param $htmlTagValue
     */
    public function setHtmlTagValue($htmlTagValue): void
    {
        $this->htmlTagValue = $htmlTagValue;
    }


}