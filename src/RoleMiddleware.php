<?php

namespace Bonjour;

class RoleMiddleware
{
    public function handle($request, \Closure $next, string $roles)
    {
	    $roles = explode('|', $roles);

        if (auth()->check() && auth()->user()->hasRoles($roles)) {
           	return $next($request);
        }

    	return redirect()->route('bonjour::auth.login.form');
    }
}