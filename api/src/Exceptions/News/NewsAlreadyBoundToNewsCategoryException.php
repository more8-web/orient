<?php

namespace App\Exceptions\News;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NewsAlreadyBoundToNewsCategoryException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NEWS_ALREADY_BOUND_TO_NEWS_CATEGORY;
    protected $message = "News already bound to news category";
}