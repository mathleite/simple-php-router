<?php


namespace App\Route;


use ReflectionMethod;

class Router implements RouterInterface
{
    private array $routes = [];

    public function dispatch(string $uri, array $params = []): void
    {
        if (key_exists($uri, $this->routes)) {
            $uriContent                = $this->routes[$uri];
            $reflectedControllerMethod = self::createReflectionMethod($uriContent);

            $reflectedControllerMethod->invokeArgs(new $uriContent['namespace'], $params);
        }
    }

    public function registry(string $uri, string $controller, string $method): void
    {
        $this->routes[$uri] = [
            'method'    => $method,
            'namespace' => $controller,
        ];
    }

    private static function createReflectionMethod(array $uriContent): ReflectionMethod
    {
        try {
            return new ReflectionMethod($uriContent['namespace'], $uriContent['method']);
        } catch (\ReflectionException $exception) {
            print $exception->getMessage();
        }
    }
}
