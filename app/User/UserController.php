<?php


namespace App\User;


use App\Base\ControllerInterface;

class UserController implements ControllerInterface
{
    public static function index(): void
    {
        echo 'Hi! I am a index function :)';
    }

}
