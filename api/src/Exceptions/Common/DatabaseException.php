<?php

namespace App\Exceptions\Common;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class DatabaseException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::DATABASE_ERROR;
    protected $message = "Database Error";
}