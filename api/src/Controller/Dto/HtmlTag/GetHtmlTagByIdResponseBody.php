<?php


namespace App\Controller\Dto\HtmlTag;

use App\Entity\HtmlTag;
use App\Entity\Keyword;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class GetHtmlTagByIdResponseBody
{
    const
        HTML_TAG_ID = "id",
        HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=GetHtmlTagByIdResponseBody::HTML_TAG_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=GetHtmlTagByIdResponseBody::HTML_TAG_VALUE, type="string")
     */
    private $htmlTagValue;

    public function __construct(HtmlTag $htmlTag)
    {
        $this->id = $htmlTag->getId();
        $this->setHtmlTagValue($htmlTag->getHtmlTagValue());
    }

    /**
     * @return array
     */
    public function asArray(): array
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