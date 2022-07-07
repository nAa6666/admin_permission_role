<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role, $guard = null)
    {
        $authGuard = Auth::guard($guard);

        if ($authGuard->guest()) {
            return redirect()->route('home', null, 301);
            //throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role) ? $role : explode('|', $role);

        if (!$authGuard->user()->hasAnyRole($roles)) {
            if(Auth::user()->roles->first()->name === 'user'){
                return redirect()->route('home', null, 301);
            }
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}
