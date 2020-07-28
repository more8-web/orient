<?php


namespace App\Controller\Dto\Log;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class CreateLogRequestBody
{

    const
        LOG_VALUE = "log_value";

    /**
     * @SWG\Property(property=CreateLogRequestBody::LOG_VALUE, type="string")
     * @Assert\NotBlank()
     */
    private $LogValue;

    /**
     * CreateNewHtmlTagRequestBody constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data[self::LOG_VALUE])) {
            $this->setLogValue($data[self::LOG_VALUE]);
        }
    }

    /**
     * @return mixed
     */
    public function getLogValue()
    {
        return $this->LogValue;
    }

    /**
     * @param mixed $LogValue
     */
    public function setLogValue($LogValue): void
    {
        $this->LogValue = $LogValue;
    }
}