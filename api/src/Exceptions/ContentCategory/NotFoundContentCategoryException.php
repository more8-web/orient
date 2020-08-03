<?php

namespace App\Exceptions\ContentCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class NotFoundContentCategoryException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::NOT_FOUND_CONTENT_CATEGORY;
    protected $message = "Content category not found";
}