<?php

use App\Route\Router;

$route = new Router();

$route->registry('/user', \App\User\UserController::class, 'index');
$route->registry('/user-create', \App\User\UserController::class, 'store');

if ($_SERVER['REQUEST_URI']) $route->dispatch($_SERVER['REQUEST_URI']);
