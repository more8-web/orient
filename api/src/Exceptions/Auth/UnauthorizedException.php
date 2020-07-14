<?php


namespace App\Exceptions\Auth;

use App\Exceptions\AbstractApiException;
use App\Exceptions\ApiExceptionCodeEnum;
use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends AbstractApiException
{
    protected $statusCode = Response::HTTP_UNAUTHORIZED;
    protected $code = ApiExceptionCodeEnum::UNAUTHORIZED;
    protected $message = "Unauthorized";
}