<?php

ini_set('session.sid_bits_per_character', 4);
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);

session_start();
session_regenerate_id(true);

require __DIR__.'/../vendor/autoload.php';

use Utils\CSRF;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

if (!(new CSRF)->token())
    CSRF::store();

$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection(config('database.connection'));
$capsule->bootEloquent();