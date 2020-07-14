<?php

namespace App\Exceptions\Common;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class MailerException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::MAILER_ERROR;
    protected $message = "Mailer Error";
}