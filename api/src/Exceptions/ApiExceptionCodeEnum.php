<?php


namespace App\Exceptions;


class ApiExceptionCodeEnum
{
    const
        BAD_REQUEST = 10000,
        DATABASE_ERROR = 10003,
        MAILER_ERROR = 10004,

        USER_ALREADY_REGISTERED = 10001,
        UNAUTHORIZED = 10002,
        CONFIRMATION_ERROR = 10005,
        INVALID_PASSWORD = 10006,
        INVALID_EMAIL = 10007,

        CANNOT_CREATE_CONTENT_CATEGORY = 10010,
        CONTENT_CATEGORY_ALREADY_EXISTS = 10011,
        PARENT_CATEGORY_IS_NOT_EXISTS = 10012,
        CONTENT_ALREADY_EXISTS = 10013,
        NOT_FOUND_CONTENT = 10014,

        KEYWORD_ALREADY_EXISTS = 10015,
        KEYWORD_NOT_FOUND = 10016,

        NEWS_CATEGORY_ALREADY_EXIST = 10017,
        NEWS_CATEGORY_NOT_FOUND = 10018
    ;
}