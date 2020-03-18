<?php

namespace App\Test\Route;

use App\Route\Router;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function test_RouteDispatch_ShouldThrowInvalidArgumentException_WhenGivenAnUnregisteredRoute(): void
    {
        $unregisteredRoute = '/unregistered-route';
        $notFoundCode      = 204;

        $route = new Router();
        $route->registry('/user', \App\User\UserController::class, 'index');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("'{$unregisteredRoute}' is an unregistered route");
        $this->expectExceptionCode($notFoundCode);

        $route->dispatch($unregisteredRoute);
    }
}
