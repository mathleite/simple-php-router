<?php

use App\Route\Router;

$route = new Router();

$route->registry('/greet', \App\Greet\GreetController::class, 'index');

$route->dispatch($_SERVER['REQUEST_URI']);
