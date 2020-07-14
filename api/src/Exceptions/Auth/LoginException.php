<?php


namespace App\Exceptions\Auth;


use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class LoginException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::INVALID_PASSWORD;
    protected $message = "Invalid password";
}