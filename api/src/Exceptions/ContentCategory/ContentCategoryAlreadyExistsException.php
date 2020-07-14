<?php

namespace App\Exceptions\ContentCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class ContentCategoryAlreadyExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONTENT_CATEGORY_ALREADY_EXISTS;
    protected $message = "Content category already exists";
}