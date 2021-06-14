<?php

namespace App\Greet;

use App\Base\ControllerInterface;

class GreetController implements ControllerInterface
{
    public static function index(): void
    {
        echo 'Hi! I am a index function :)';
    }

}
