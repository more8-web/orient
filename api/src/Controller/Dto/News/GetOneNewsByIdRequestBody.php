<?php


namespace App\Controller\Dto\News;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetOneNewsByIdRequestBody
{

    const
        NEWS_ = "parameters";

    /**
     * @SWG\Property(property=GetOneNewsByIdRequestBody::KEYWORD_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $parameters;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::GET_NEWS_PARAMETERS])) {
            $this->setParameters($data[self::GET_NEWS_PARAMETERS]);
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