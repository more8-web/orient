<?php


namespace App\Exceptions;


class DatabaseException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::DATABASE_ERROR;
    protected $message = "Database Error";
}