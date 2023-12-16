<?php

require_once __DIR__.'/../app/bootstrap.php';

$routeDefinitionCallback = require __DIR__.'/../app/routes.php';

$app = new \Core\App($routeDefinitionCallback);
$app->run();