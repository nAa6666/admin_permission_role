<?php

namespace App\Exceptions;

use InvalidArgumentException;

class PermissionDoesNotExist extends InvalidArgumentException
{
    public static function create(string $permissionName, string $guardName = '')
    {
        return new static(__('auth.permission_does_not_exist', ['param1' => $permissionName, 'param2' => $guardName]));
    }

    public static function withId(int $permissionId, string $guardName = '')
    {
        return new static(__('auth.permission_does_not_exist2', ['param1' => $permissionId, 'param2' => $guardName]));
    }
}
