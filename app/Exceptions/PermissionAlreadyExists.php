<?php

namespace App\Exceptions;

use InvalidArgumentException;

class PermissionAlreadyExists extends InvalidArgumentException
{
    public static function create(string $permissionName, string $guardName)
    {
        return new static(__('auth.guard_does_not_match', ['param1' => $permissionName, 'param2' => $guardName]));
    }
}
