<?php


namespace App\Controller\Dto\Request;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class HtmlTag
{

    const
        HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=HtmlTag::HTML_TAG_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $htmlTagValue;

    /**
     * HtmlTag constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::HTML_TAG_VALUE])) {
            $this->setHtmlTagValue($data[self::HTML_TAG_VALUE]);
        }
    }

    /**
     * @return string
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