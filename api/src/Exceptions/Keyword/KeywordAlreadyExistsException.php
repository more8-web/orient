<?php

namespace App\Exceptions\Keyword;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class KeywordAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::KEYWORD_ALREADY_EXISTS;
    protected $message = "Keyword already exists";
}