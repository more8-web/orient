<?php


namespace App\Controller\Dto\HtmlTag;

use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class EditHtmlTagRequestBody
{

    const
        HTML_TAG_ID = "id",
        HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=EditHtmlTagRequestBody::HTML_TAG_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=EditHtmlTagRequestBody::HTML_TAG_VALUE, type="string")
     */
    private $htmlTagValue;

    /**
     * EditHtmlTagRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::HTML_TAG_ID])) {
            $this->id = ($data[self::HTML_TAG_ID]);
        }
        if (isset($data[self::HTML_TAG_VALUE])) {
            $this->setHtmlTagValue($data[self::HTML_TAG_VALUE]);
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
     * @return mixed
     */
    public function getHtmlTagValue()
    {
        return $this->htmlTagValue;
    }

    /**
     * @param mixed $htmlTagValue
     */
    public function setHtmlTagValue($htmlTagValue): void
    {
        $this->htmlTagValue = $htmlTagValue;
    }
}