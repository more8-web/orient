<?php


namespace App\Controller\Dto\Content;

use App\Controller\Dto\ResponseBodyInterface;
use App\Entity\Content;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewContentResponseBody implements ResponseBodyInterface
{
    const
        CONTENT_ID = "id",
        CONTENT_ALIAS = "content_alias",
        CONTENT_DESCRIPTION = "content_description",
        CONTENT_VALUE = "content_value";

    /**
     * @SWG\Property(property=CreateNewContentResponseBody::CONTENT_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=CreateNewContentResponseBody::CONTENT_ALIAS, type="string")
     */
    private $contentAlias;

    /**
     * @SWG\Property(property=CreateNewContentResponseBody::CONTENT_DESCRIPTION, type="string")
     */
    private $contentDescription;

    /**
     * @SWG\Property(property=CreateNewContentResponseBody::CONTENT_VALUE, type="string")
     */
    private $contentValue;

    /**
     * CreateContentCategoryResponseBody constructor.
     * @param Content $category
     */
    public function __construct(Content $category)
    {
        $this->id = $category->getId();
        $this->setContentAlias($category->getContentAlias());
        $this->setContentDescription($category->getContentDescription());
        $this->setContentValue($category->getContentValue());
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