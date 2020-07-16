<?php

namespace App\Exceptions\NewsCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NewsCategoryAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NEWS_CATEGORY_ALREADY_EXIST;
    protected $message = "News category already exists";
}