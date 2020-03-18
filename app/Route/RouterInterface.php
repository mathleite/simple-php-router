<?php


namespace App\Route;


use App\Base\ControllerInterface;

interface RouterInterface
{
    public function registry(string $uri, string $controller, string $method): void;

    public function dispatch(string $requestAction, array $params): void;
}
