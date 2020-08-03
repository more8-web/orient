<?php

namespace App\Controller\Dto\Response;

use Swagger\Annotations as SWG;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @SWG\Definition(type="object")
 */
class Log
{
    const
        LOG_ID = "log_id",
        LOG_VALUE = "log_value",
        LOG_CREATED_AT = "log_created_at";

    /**
     * @SWG\Property(property=Log::LOG_ID, type="integer")
     */
    private $logId;

    /**
     * @SWG\Property(property=Log::LOG_VALUE, type="text")
     * @Assert\NotBlank()
     */
    private $logValue;

    /**
     * @SWG\Property(property=Log::LOG_CREATED_AT, type="datetime")
     * @Assert\NotBlank()
     */
    private $logCreatedAt;

    /**
     * Log constructor.
     * @param \App\Entity\Log $log
     */
    public function __construct(\App\Entity\Log $log)
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