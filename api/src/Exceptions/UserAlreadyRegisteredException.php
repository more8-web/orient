<?php

namespace App\Exceptions;

class UserAlreadyRegisteredException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::USER_ALREADY_REGISTERED;
    protected $message = "UserAlreadyRegistered";
}