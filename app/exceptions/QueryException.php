<?php

namespace youllusion\app\exceptions;

Class QueryException extends AppException
{
    public function __construct(string $message = "", int $code = 500)
    {
        parent::__construct($message, $code);
    }
}