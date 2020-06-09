<?php


namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class DatabaseException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::DATABASE_ERROR;
    protected $message = "Database Error";
}