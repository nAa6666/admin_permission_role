<?php

namespace App\Exceptions;

use InvalidArgumentException;

class WildcardPermissionNotProperlyFormatted extends InvalidArgumentException
{
    public static function create(string $permission)
    {
        return new static(__('auth.wildcard_permission_not_properly_formatted', ['param1' => $permission]));
    }
}
