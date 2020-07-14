<?php

namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;

class UserAlreadyRegisteredException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::USER_ALREADY_REGISTERED;
    protected $message = "User already registered";
}