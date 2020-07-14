<?php


namespace App\Exceptions\Auth;


use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundEmailException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::INVALID_EMAIL;
    protected $message = "Not found email";
}