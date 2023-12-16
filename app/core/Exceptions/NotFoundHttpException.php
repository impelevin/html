<?php

namespace Core\Exceptions;

class NotFoundHttpException extends Exception
{
    protected $message = 'Page Not Found';

    protected $code = 404;
}