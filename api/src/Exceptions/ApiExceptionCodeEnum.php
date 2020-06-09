<?php


namespace App\Exceptions;


class ApiExceptionCodeEnum
{
    const
        BAD_REQUEST = 10000,
        USER_ALREADY_REGISTERED = 10001,
        UNAUTHORIZED = 10002,
        DATABASE_ERROR = 10003,
        MAILER_ERROR = 10004
    ;
}