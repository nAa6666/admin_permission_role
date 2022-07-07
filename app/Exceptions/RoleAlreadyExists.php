<?php

namespace App\Exceptions;

use InvalidArgumentException;

class RoleAlreadyExists extends InvalidArgumentException
{
    public static function create(string $roleName, string $guardName)
    {
        return new static(__('auth.role_already_exists', ['param1' => $roleName, 'param2' => $guardName]));
    }
}
