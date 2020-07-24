<?php


namespace App\Controller\Dto\HtmlTag;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteHtmlTagRequestBody
{

    const
        HTML_TAG_ID = "id";

    /**
     * @SWG\Property(property=DeleteHtmlTagRequestBody::HTML_TAG_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * DeleteHtmlTagRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::HTML_TAG_ID])) {
            $this->id = ($data[self::HTML_TAG_ID]);
        }
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}