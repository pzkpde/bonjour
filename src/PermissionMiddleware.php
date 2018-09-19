<?php

namespace Bonjour;

class PermissionMiddleware
{
    public function handle($request, \Closure $next, string $permissions)
    {
	    $permissions = explode('|', $permissions);

        if (auth()->check() && auth()->user()->hasPermissions($permissions)) {
           	return $next($request);
        }

    	return redirect()->route('bonjour::auth.login.form');
    }
}