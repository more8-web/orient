<?php


namespace App\Exceptions;


class NotFoundEmailException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::INVALID_EMAIL;
    protected $message = "Not found email";
}