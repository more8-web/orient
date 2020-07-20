<?php

namespace App\Exceptions\News;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NewsNotFoundException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NEWS_NOT_FOUND;
    protected $message = "News not found";
}