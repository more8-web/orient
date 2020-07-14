<?php

namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class BadConfirmationCodeException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONFIRMATION_ERROR;
    protected $message = "Invalid confirmation code";
}