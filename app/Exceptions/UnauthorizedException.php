<?php
namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UnauthorizedException extends HttpException
{
    private $requiredRoles = [];

    private $requiredPermissions = [];

    public static function forRoles(array $roles): self
    {
        $message = __('auth.for_roles');

        if (config('permission.display_permission_in_exception')) {
            $permStr = implode(', ', $roles);
            $message = __('auth.for_roles2', ['param1' => $permStr]);
        }

        $exception = new static(403, $message, null, []);
        $exception->requiredRoles = $roles;

        return $exception;
    }

    public static function forPermissions(array $permissions): self
    {
        $message = __('auth.for_permissions');

        if (config('permission.display_permission_in_exception')) {
            $permStr = implode(', ', $permissions);
            $message = __('auth.for_permissions2', ['param1' => $permStr]);
        }

        $exception = new static(403, $message, null, []);
        $exception->requiredPermissions = $permissions;

        return $exception;
    }

    public static function forRolesOrPermissions(array $rolesOrPermissions): self
    {
        $message = __('auth.for_roles_or_permissions');

        if (config('permission.display_permission_in_exception') && config('permission.display_role_in_exception')) {
            $permStr = implode(', ', $rolesOrPermissions);
            $message = __('auth.for_roles_or_permissions2', ['param1' => $permStr]);
        }

        $exception = new static(403, $message, null, []);
        $exception->requiredPermissions = $rolesOrPermissions;

        return $exception;
    }

    public static function notLoggedIn(): self
    {
        return new static(403, __('auth.not_logged_in'), null, []);
    }

    public function getRequiredRoles(): array
    {
        return $this->requiredRoles;
    }

    public function getRequiredPermissions(): array
    {
        return $this->requiredPermissions;
    }
}
