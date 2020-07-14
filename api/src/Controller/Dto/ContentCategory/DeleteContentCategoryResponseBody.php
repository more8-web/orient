<?php


namespace App\Controller\Dto\ContentCategory;

use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class DeleteContentCategoryResponseBody
{
    /**
     * @SWG\Property(property=EditContentCategoryResponseBody::CONTENT_CATEGORY_ID, type="integer")
     */
    private string $message;

    /**
     * DeleteContentCategoryResponseBody constructor.
     */
    public function __construct()
    {
        $this->message = 'Content category deleted';
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

}