<?php

namespace App\Exceptions;

use InvalidArgumentException;

class RoleDoesNotExist extends InvalidArgumentException
{
    public static function named(string $roleName)
    {
        return new static(__('auth.role_does_not_exist', ['param1' => $roleName]));
    }

    public static function withId(int $roleId)
    {
        return new static(__('auth.role_does_not_exist2', ['param1' => $roleId]));
    }
}
