<?php


namespace App\Controller\Dto\ContentCategory;

use App\Entity\Content;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetContentByCategoryResponseBody
{
    const
        CONTENT_ID = "id",
        CONTENT_ALIAS = "content_alias",
        CONTENT_DESCRIPTION = "content_description",
        CONTENT_VALUE = "content_value";

    /**
     * @SWG\Property(property=GetContentByCategoryResponseBody::CONTENT_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @SWG\Property(property=GetContentByCategoryResponseBody::CONTENT_ALIAS, type="string")
     */
    private $contentAlias;

    /**
     * @SWG\Property(property=GetContentByCategoryResponseBody::CONTENT_DESCRIPTION, type="string")
     */
    private $contentDescription;

    /**
     * @SWG\Property(property=GetContentByCategoryResponseBody::CONTENT_VALUE, type="string")
     */
    private $contentValue;

    /**
     * GetOneContentResponseBody constructor.
     * @param Content $content
     */
    public function __construct(Content $content)
    {
        $this->id = ($content->getId());
        $this->setContentAlias($content->getContentAlias());
        $this->setContentDescription($content->getContentDescription());
        $this->setContentValue($content->getContentValue());
    }

    public function asArray(): array
    {
        return [
            self::CONTENT_ID => $this->getId(),
            self::CONTENT_ALIAS => $this->getContentAlias(),
            self::CONTENT_DESCRIPTION => $this->getContentDescription(),
            self::CONTENT_VALUE => $this->getContentValue(),
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getContentAlias()
    {
        return $this->contentAlias;
    }

    /**
     * @param mixed $contentAlias
     */
    public function setContentAlias($contentAlias): void
    {
        $this->contentAlias = $contentAlias;
    }

    /**
     * @return mixed
     */
    public function getContentDescription()
    {
        return $this->contentDescription;
    }

    /**
     * @param mixed $contentDescription
     */
    public function setContentDescription($contentDescription): void
    {
        $this->contentDescription = $contentDescription;
    }

    /**
     * @return mixed
     */
    public function getContentValue()
    {
        return $this->contentValue;
    }

    /**
     * @param mixed $contentValue
     */
    public function setContentValue($contentValue): void
    {
        $this->contentValue = $contentValue;
    }
}