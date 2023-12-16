<?php

namespace Middlewares;

use Core\Middleware;
use Utils\Response;

class RedirectIfAuthorized extends Middleware
{
    public static function handle(array $args)
    {
       if (isAuth())
           (new Response)->redirect('/');
    }
}