<?php

namespace App\Exceptions\HtmlTags;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class HtmlTagAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::HTML_TAG_ALREADY_EXISTS;
    protected $message = "Html tag already exists";
}