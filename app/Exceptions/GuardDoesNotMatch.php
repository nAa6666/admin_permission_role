<?php

namespace App\Exceptions;

use Illuminate\Support\Collection;
use InvalidArgumentException;

class GuardDoesNotMatch extends InvalidArgumentException
{
    public static function create(string $givenGuard, Collection $expectedGuards)
    {
        return new static(__('auth.guard_does_not_match', ['param1' => $expectedGuards->implode(', '), 'param2' => $givenGuard]));
    }
}
