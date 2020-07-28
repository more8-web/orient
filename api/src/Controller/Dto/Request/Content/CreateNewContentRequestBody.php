<?php


namespace App\Controller\Dto\Content;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateNewContentRequestBody
{

    const
        CONTENT_ALIAS = "content_alias",
        CONTENT_DESCRIPTION = "content_description",
        CONTENT_VALUE = "content_value";

    /**
     * @SWG\Property(property=CreateNewContentRequestBody::CONTENT_ALIAS, type="string")
     * @Assert\NotBlank()
     */
    private $contentAlias;

    /**
     * @SWG\Property(property=CreateNewContentRequestBody::CONTENT_DESCRIPTION, type="string")
     */
    private $contentDescription;

    /**
     * @SWG\Property(property=CreateNewContentRequestBody::CONTENT_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $contentValue;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CONTENT_ALIAS])) {
            $this->setContentAlias($data[self::CONTENT_ALIAS]);
        }

        if (isset($data[self::CONTENT_DESCRIPTION])) {
            $this->setContentDescription($data[self::CONTENT_DESCRIPTION]);
        }

        if (isset($data[self::CONTENT_VALUE])) {
            $this->setContentValue($data[self::CONTENT_VALUE]);
        }
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