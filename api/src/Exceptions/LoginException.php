<?php


namespace App\Exceptions;


class LoginException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::INVALID_PASSWORD;
    protected $message = "Invalid password";
}