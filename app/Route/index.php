<?php

use App\Route\Router;

$route = new Router();

$route->registry('/user', \App\User\UserController::class, 'index');

$route->dispatch($_SERVER['REQUEST_URI']);
