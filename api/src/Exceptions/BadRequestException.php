<?php


namespace App\Exceptions;

class BadRequestException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::BAD_REQUEST;
    protected $message = "Bad Request";
}