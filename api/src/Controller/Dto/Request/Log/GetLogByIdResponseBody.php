<?php


namespace App\Controller\Dto\Log;

use App\Entity\Log;
use DateTime;
use Swagger\Annotations as SWG;

/**
 * @SWG\Definition(type="object")
 */
class GetLogByIdResponseBody
{
    const
        LOG_ID = "id",
        LOG_VALUE = "log_value",
        LOG_CREATED_AT = "log_created_at";

    /**
     * @SWG\Property(property=GetLogByIdResponseBody::LOG_ID, type="integer")
     */
    private $id;

    /**
     * @SWG\Property(property=GetLogByIdResponseBody::LOG_VALUE, type="text")
     */
    private $logValue;

    /**
     * @SWG\Property(property=GetLogByIdResponseBody::LOG_CREATED_AT, type="datetime")
     */
    private $log_created_at;

    /**
     * GetLogByIdResponseBody constructor.
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->id = $log->getId();
        $this->setLogValue($log->getLogValue());
        $this->setLogCreatedAt($log->getCreatedAt());
    }

    /**
     * @return array
     */
    public function asArray(): array
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
     * @param string $logValue
     */
    public function setLogValue($logValue): void
    {
        $this->logValue = $logValue;
    }

    /**
     * @return DateTime
     */
    public function getLogCreatedAt()
    {
        return $this->log_created_at;
    }

    /**
     * @param DateTime $log_created_at
     */
    public function setLogCreatedAt($log_created_at): void
    {
        $this->log_created_at = $log_created_at;
    }
}