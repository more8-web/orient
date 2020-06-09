<?php


namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends AbstractApiException
{
    protected $statusCode = Response::HTTP_UNAUTHORIZED;
    protected $code = ApiExceptionCodeEnum::UNAUTHORIZED;
    protected $message = "Unauthorized";
}