<?php

namespace App\Exceptions\HtmlTags;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundHtmlTagException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::HTML_TAG_NOT_FOUND;
    protected $message = "Html tag not found";
}