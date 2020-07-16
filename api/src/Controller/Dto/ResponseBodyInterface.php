<?php

namespace App\Controller\Dto;

interface ResponseBodyInterface
{
    public function asArray(): array;
}