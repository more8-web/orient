<?php

namespace App\Exceptions\Content;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class ContentAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONTENT_ALREADY_EXISTS;
    protected $message = "Content already exists";
}