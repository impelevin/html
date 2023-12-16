<?php

namespace Core;

use FastRoute\Dispatcher;
use Utils\FlashMassages;
use Utils\OldFormData;
use Core\Exceptions;

class App
{
    public function __construct($routeDefinitionCallback)
    {
        $this->router = \FastRoute\simpleDispatcher($routeDefinitionCallback);
    }

    public function run()
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (($pos = strpos($uri, '?')) !== false)
            $uri = substr($uri, 0, $pos);

        $routeInfo = $this->router->dispatch($httpMethod, $uri);

        try {
            switch ($routeInfo[0]) {
                case Dispatcher::NOT_FOUND:
                    throw new Exceptions\NotFoundHttpException();
                case Dispatcher::METHOD_NOT_ALLOWED:
                    throw new Exceptions\MethodNotAllowedException();
                case Dispatcher::FOUND:
                    $handler = $routeInfo[1];
                    $args = $routeInfo[2];

                    list($middlewares, $controller, $method) = $this->parseHandler($handler);

                    if ($middlewares)
                        $this->handleMiddleware($middlewares, $args);

                    call_user_func_array([new $controller, $method], $args);
                    break;
            }
        } catch (\Exception $e) {
            $exception = new Exceptions\Exception($e->getMessage(), $e->getCode());
            $exception->show();
        }

        FlashMassages::clear();
        OldFormData::clear();
    }

    private function parseHandler(array $handler)
    {
        $middlewares = $controller = $method = null;

        if (isset($handler['middlewares'])) {
            list($middlewares, $controller, $method) = [$handler['middlewares'], $handler['action'][0], $handler['action'][1]];
        } else {
            list($controller, $method) = $handler;
        }

        return [$middlewares, $controller, $method];
    }

    private function handleMiddleware(array $middlewares, $args)
    {
        foreach ($middlewares as $middleware) {
            call_user_func_array([$middleware, 'handle'], [$args]);
        }
    }
}