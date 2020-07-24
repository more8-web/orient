<?php

namespace App\Exceptions\Log;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class LogAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::LOG_ALREADY_EXISTS;
    protected $message = "Log already exists";
}