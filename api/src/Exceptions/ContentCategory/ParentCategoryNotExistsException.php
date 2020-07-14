<?php

namespace App\Exceptions\ContentCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class ParentCategoryNotExistsException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::PARENT_CATEGORY_IS_NOT_EXISTS;
    protected $message = "Parent category does not exists";
}