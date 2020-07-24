<?php

namespace App\Exceptions\Log;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundLogException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::LOG_NOT_FOUND;
    protected $message = "Log not found";
}