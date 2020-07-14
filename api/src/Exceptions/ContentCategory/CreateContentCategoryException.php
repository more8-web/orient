<?php

namespace App\Exceptions\ContentCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class CreateContentCategoryException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CANNOT_CREATE_CONTENT_CATEGORY;
    protected $message = "Cannot create content category";
}