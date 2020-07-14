<?php

namespace App\Controller;

use App\Exceptions\Auth\BadRequestException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ConstraintViolation;

abstract class AbstractApiController extends AbstractController
{
    protected function getJson(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException('invalid json body: ' . json_last_error_msg());
        }
        return $data;

    }

    /**
     * @param Request $request
     * @param $class
     * @return mixed
     * @throws BadRequestException
     */
    protected function getDto(Request $request, $class)
    {
        $dto = new $class($this->getJson($request));

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $errors = $validator->validate($dto);
        if (count($errors) > 0) {
            $details = [];
            /** @var ConstraintViolation $error */
            foreach ($errors as $error) {
                $details[$error->getPropertyPath()] = $error->getMessage();
            }

            throw new BadRequestException($details);
        }

        return $dto;
    }
}
