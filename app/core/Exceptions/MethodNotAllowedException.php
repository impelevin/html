<?php

namespace Core\Exceptions;

class MethodNotAllowedException extends Exception
{
    protected $message = 'Method Not Allowed';

    protected $code = 405;
}