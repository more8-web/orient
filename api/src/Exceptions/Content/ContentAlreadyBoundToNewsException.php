<?php

namespace App\Exceptions\Content;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class ContentAlreadyBoundToNewsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONTENT_ALREADY_BOUND_TO_NEWS;
    protected $message = "Content already bound to news";
}