<?php

namespace App\Exceptions\Keyword;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class KeywordAlreadyBoundToContentException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::KEYWORD_ALREADY_BOUND_TO_CONTENT;
    protected $message = "Keyword already bound to content";
}