<?php


namespace App\Controller\Dto\Keyword;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class DeleteKeywordRequestBody
{

    const
        KEYWORD_ID = "id";

    /**
     * @SWG\Property(property=DeleteKeywordRequestBody::KEYWORD_ID, type="integer")
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * DeleteKeywordRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::KEYWORD_ID])) {
            $this->id = ($data[self::KEYWORD_ID]);
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