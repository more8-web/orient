<?php

namespace App\Exceptions\ContentCategory;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class ContentAlreadyBoundToContentCategoryException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::CONTENT_ALREADY_BOUND_TO_CONTENT_CATEGORY;
    protected $message = "Content already bound to content category";
}