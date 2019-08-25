<?php

namespace App\Exceptions;


class InvalidUnitException extends \Exception
{

    protected $message = "Invalid unit.";
    protected $code = 422;

}