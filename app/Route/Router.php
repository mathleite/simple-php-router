<?php


namespace App\Route;


use InvalidArgumentException;
use ReflectionException;
use ReflectionMethod;

class Router implements RouterInterface
{
    private const NOT_FOUND_CODE = 204;
    private array $routes = [];

    public function dispatch(string $uri, array $params = []): void
    {
        if (key_exists($uri, $this->routes)) {
            $uriContent                = $this->routes[$uri];
            $reflectedControllerMethod = self::createReflectionMethod($uriContent);

            $reflectedControllerMethod->invokeArgs(new $uriContent['namespace'], $params);
        }

        throw new InvalidArgumentException("'{$uri}' is an unregistered route", self::NOT_FOUND_CODE);
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
        } catch (ReflectionException $exception) {
            print $exception->getMessage();
        }
    }
}
