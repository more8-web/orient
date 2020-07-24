<?php

namespace App\Controller\Dto\Entities;

use App\Entity\Log;
use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class LogResponse
{
    const
        LOG_ID = "log_id",
        LOG_VALUE = "log_value",
        LOG_CREATED_AT = "log_created_at";

    /**
     * @SWG\Property(property=LogResponse::LOG_ID, type="integer")
     */
    private $logId;

    /**
     * @SWG\Property(property=LogResponse::LOG_VALUE, type="text")
     * @Assert\NotBlank()
     */
    private $logValue;

    /**
     * @SWG\Property(property=LogResponse::LOG_CREATED_AT, type="datetime")
     * @Assert\NotBlank()
     */
    private $log_created_at;

    public function __construct(Log $log)
    {
        $this->setLogId($log->getId());
        $this->setLogValue($log->getLogValue());
        $this->setLogCreatedAt($log->getCreatedAt());
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return [
            self::LOG_ID => $this->getLogId(),
            self::LOG_VALUE => $this->getLogValue(),
            self::LOG_CREATED_AT => $this->getLogCreatedAt()
        ];
    }

    /**
     * @return int|null
     */
    public function getLogId(): ?int
    {
        return $this->logId;
    }

    /**
     * @param mixed $logId
     */
    public function setLogId($logId): void
    {
        $this->logId = $logId;
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
        return $this->log_created_at;
    }

    /**
     * @param mixed $log_created_at
     */
    public function setLogCreatedAt($log_created_at): void
    {
        $this->log_created_at = $log_created_at;
    }
}