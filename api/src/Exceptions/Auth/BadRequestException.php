<?php


namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class BadRequestException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::BAD_REQUEST;
    protected $message = "Bad Request";
}