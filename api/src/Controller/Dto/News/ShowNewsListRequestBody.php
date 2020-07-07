<?php


namespace App\Controller\Dto\News;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class ShowNewsListRequestBody
{

    const
        NEWS_LIST_FILTER = "filter";

    /**
     * @SWG\Property(type="string")
     * @Assert\NotBlank()
     */
    private $filter;

    /**
     * NewsRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::NEWS_LIST_FILTER])) {
            $this->setFilter($data[self::NEWS_LIST_FILTER]);
        }
    }

    public function getFilter()
    {
        return $this->filter;
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }
}