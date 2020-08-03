<?php

namespace App\Exceptions\Keyword;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class KeywordAlreadyBoundToNewsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::KEYWORD_ALREADY_BOUND_TO_NEWS;
    protected $message = "Keyword already bound to news";
}