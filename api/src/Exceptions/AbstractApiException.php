<?php


namespace App\Exceptions;


use phpDocumentor\Reflection\Types\This;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class AbstractApiException extends HttpException implements ApiExceptionInterface
{

    protected $statusCode = Response::HTTP_BAD_REQUEST;
    protected $details = [];
    protected $debugInfo;

    public function __construct($details = [])
    {
        parent::__construct($this->statusCode, $this->message);
        $this->details = $details;
    }

    /**
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(
            [
                "code" => $this->getCode(),
                "message" => $this->getMessage(),
                "details" => $this->getDetails(),
            ],
            $_SERVER['APP_DEBUG'] ? [
                "debug" => $this->getDebugInfo()
            ] : []
        );
    }

    /**
     * @return mixed
     */
    public function getDebugInfo()
    {
        return $this->debugInfo;
    }

    /**
     * @param mixed $info
     * @return AbstractApiException
     */
    public function setDebugInfo($info): AbstractApiException
    {
        $this->debugInfo = $info;
        return $this;
    }
}