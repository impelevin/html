<?php

namespace Core\Exceptions;

class CSRFException extends Exception
{
    protected $message = 'CSRF token mismatch';

    protected $code = 519;
}