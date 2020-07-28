<?php


namespace App\Controller\Dto\HtmlTag;

use App\Entity\HtmlTag;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetHtmlTagListResponseBody
{
    const
            HTML_TAG_ID = "id",
            HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=GetHtmlTagListResponseBody::HTML_TAG_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=GetHtmlTagListResponseBody::HTML_TAG_VALUE, type="string")
     */
    private $htmlTagValue;

    /**
     * GetHtmlTagListResponseBody constructor.
     * @param HtmlTag $htmlTag
     */
    public function __construct(HtmlTag $htmlTag)
    {
        $this->id = $htmlTag->getId();
        $this->setHtmlTagValue($htmlTag->getHtmlTagValue());
    }

    public function asArray()
    {
        return [
            self::HTML_TAG_ID => $this->getId(),
            self::HTML_TAG_VALUE => $this->getHtmlTagValue(),
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