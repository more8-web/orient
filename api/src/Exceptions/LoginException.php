<?php


namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class LoginException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::INVALID_PASSWORD;
    protected $message = "Invalid password";
}