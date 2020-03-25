<?php

use Illuminate\Database\Capsule\Manager;


$manager = new Manager;

$manager->addConnection([
    'driver'        => getenv('DATABASE_DRIVER'),
    'host'          => getenv('DATABASE_HOST'),
    'database'      => getenv('DATABASE_NAME'),
    'username'      => getenv('DATABASE_USER'),
    'password'      => getenv('DATABASE_PASSWORD'),
    'schema'        => getenv('DATABASE_SCHEMA'),
    'charset'       => 'utf8',
    'collation'     => 'utf8_unicode_ci',
    'prefix'        => '',
]);

$manager->setAsGlobal();

$manager->bootEloquent();
