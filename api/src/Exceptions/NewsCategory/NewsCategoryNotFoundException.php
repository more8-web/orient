<?php

namespace App\Exceptions\NewsCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NewsCategoryNotFoundException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NEWS_CATEGORY_NOT_FOUND;
    protected $message = "News category not found";
}