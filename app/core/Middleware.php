<?php

namespace Core;

abstract class Middleware
{
    public static abstract function handle(array $args);
}