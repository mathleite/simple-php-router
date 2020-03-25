<?php

namespace App\User;

use App\Base\ControllerInterface;

class UserController implements ControllerInterface
{
    public static function index(): void
    {
        var_dump(UserModel::all()->toArray());
    }

    public static function store(): void
    {
        UserModel::create([
            'name'     => 'Xpto Name',
            'email'    => 'xpto@email.com',
            'password' => password_hash('xpto#@xpto', PASSWORD_ARGON2I),
        ]);
    }
}
