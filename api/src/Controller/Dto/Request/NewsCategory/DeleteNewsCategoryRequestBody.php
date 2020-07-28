<?php


namespace App\Controller\Dto\NewsCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteNewsCategoryRequestBody
{
    const NEWS_CATEGORY_ID = "id";

    /**
     * @SWG\Property(property=DeleteNewsCategoryRequestBody::NEWS_CATEGORY_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    public function __construct(array $data)
    {
        if (isset($data[self::NEWS_CATEGORY_ID])) {
            $this->id = $data[self::NEWS_CATEGORY_ID];
        }

    }

    public function asArray()
    {
        return [
            self::NEWS_CATEGORY_ID => $this->getId()
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}