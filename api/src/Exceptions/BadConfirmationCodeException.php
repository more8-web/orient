<?php

namespace App\Exceptions;

class BadConfirmationCodeException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONFIRMATION_ERROR;
    protected $message = "Invalid confirmation code";
}