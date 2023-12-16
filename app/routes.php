<?php

use Controllers\TaskController;
use Controllers\AuthController;
use Middlewares\RedirectIfAuthorized;
use Middlewares\Authorized;
use FastRoute\RouteCollector;

return function (RouteCollector $route) {

    $route->addRoute('GET', '/', [TaskController::class, 'index']);

    $route->addRoute('GET', '/create', [TaskController::class, 'create']);
    $route->addRoute('POST', '/create', [TaskController::class, 'store']);

    $route->addRoute('GET', '/{id:\d+}', [TaskController::class, 'show']);
    $route->addRoute('POST', '/{id:\d+}/update', [
        'middlewares' => [Authorized::class],
        'action' => [TaskController::class, 'update']
    ]);

    $route->addRoute('GET', '/login', [
        'middlewares' => [RedirectIfAuthorized::class],
        'action' => [AuthController::class, 'show']
    ]);

    $route->addRoute('POST', '/login', [
        'middlewares' => [RedirectIfAuthorized::class],
        'action' => [AuthController::class, 'login']
    ]);

    $route->addRoute('GET', '/logout', [AuthController::class, 'logout']);

};