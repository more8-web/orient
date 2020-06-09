<?php


namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class MailerException extends AbstractApiException
{
    protected $code = ApiExceptionCodeEnum::MAILER_ERROR;
    protected $message = "Mailer Error";
}