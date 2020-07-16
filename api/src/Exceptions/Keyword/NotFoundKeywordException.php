<?php

namespace App\Exceptions\Keyword;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundKeywordException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::KEYWORD_NOT_FOUND;
    protected $message = "Keyword not found";
}