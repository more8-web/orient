<?php


namespace App\Exceptions;


interface ApiExceptionInterface
{
    public function getStatusCode();
    public function getCode();
    public function getMessage();
    public function getDetails();
    public function toArray();
}