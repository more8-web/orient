<?php

namespace App\Exceptions\Content;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundContentException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NOT_FOUND_CONTENT;
    protected $message = "Content not found";
}