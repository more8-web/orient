<?php


namespace App\Controller\Dto\ContentCategory;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetOneContentCategoryByIdRequestBody
{

    const
        CREATE_NEWS_PARAMETERS = "parameters";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $parameters;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::CREATE_NEWS_PARAMETERS])) {
            $this->setParameters($data[self::CREATE_NEWS_PARAMETERS]);
        }
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }
}