<?php

namespace App\Exceptions\HtmlTags;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class HtmlTagAlreadyBoundToContentException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::HTML_TAG_ALREADY_BOUND_TO_CONTENT;
    protected $message = "Html tag already bound to content";
}