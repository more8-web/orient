<?php


namespace App\Controller\Dto\Log;

use App\Entity\HtmlTag;
use App\Entity\Log;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class GetLogListResponseBody
{
    const
            LOG_ID = "id",
            LOG_VALUE = "log_value",
            LOG_CREATED_AT = "log_created_at";

    /**
     * @SWG\Property(property=GetLogListResponseBody::LOG_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=GetLogListResponseBody::LOG_VALUE, type="text")
     */
    private $logValue;

    /**
     * @SWG\Property(property=GetLogListResponseBody::LOG_CREATED_AT, type="datetime")
     */
    private $logCreatedAt;

    /**
     * GetLogListResponseBody constructor.
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->id = $log->getId();
        $this->setLogValue($log->getLogValue());
        $this->setLogCreatedAt($log->getCreatedAt());
    }

    public function asArray()
    {
        return [
            self::LOG_ID => $this->getId(),
            self::LOG_VALUE => $this->getLogValue(),
            self::LOG_CREATED_AT => $this->getLogCreatedAt()
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLogValue()
    {
        return $this->logValue;
    }

    /**
     * @param mixed $logValue
     */
    public function setLogValue($logValue): void
    {
        $this->logValue = $logValue;
    }

    /**
     * @return mixed
     */
    public function getLogCreatedAt()
    {
        return $this->logCreatedAt;
    }

    /**
     * @param mixed $logCreatedAt
     */
    public function setLogCreatedAt($logCreatedAt): void
    {
        $this->logCreatedAt = $logCreatedAt;
    }

}