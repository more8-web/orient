<?php

namespace App\Controller\Dto\Entities;

use App\Entity\HtmlTag;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class HtmlTagResponse
{
    const
        HTML_TAG_ID = "html_tag_id",
        HTML_TAG_VALUE = "html_tag_value";

    /**
     * @SWG\Property(property=HtmlTagResponse::HTML_TAG_ID, type="integer")
     */
    private $htmlTagId;

    /**
     * @SWG\Property(property=HtmlTagResponse::HTML_TAG_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $htmlTagValue;

    public function __construct(HtmlTag $htmlTag)
    {
        $this->setHtmlTagId($htmlTag->getId());
        $this->setHtmlTagValue($htmlTag->getHtmlTagValue());
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return [
            self::HTML_TAG_ID => $this->getHtmlTagId(),
            self::HTML_TAG_VALUE => $this->getHtmlTagValue(),
        ];
    }

    /**
     * @return int|null
     */
    public function getHtmlTagId(): ?int
    {
        return $this->htmlTagId;
    }

    /**
     * @param mixed $htmlTagId
     */
    public function setHtmlTagId($htmlTagId): void
    {
        $this->htmlTagId = $htmlTagId;
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