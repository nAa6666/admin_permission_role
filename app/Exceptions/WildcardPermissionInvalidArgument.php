<?php

namespace App\Exceptions;

use InvalidArgumentException;

class WildcardPermissionInvalidArgument extends InvalidArgumentException
{
    public static function create()
    {
        return new static(__('auth.wildcard_permission_invalid_argument'));
    }
}
