<?php

namespace Middlewares;

use Core\Middleware;
use Utils\Response;

class Authorized extends Middleware
{
    public static function handle(array $args)
    {
       if (!isAuth())
           (new Response)->redirect('/login');
    }
}