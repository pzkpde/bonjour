<?php

namespace Bonjour\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Collection;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,
            'user_role', 'user_id', 'role_id'
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,
            'user_permission', 'user_id', 'permission_id'
        );
    }

    protected $user_roles = null;
    protected $user_permissions = null;

    protected function parseRolesAndPermissions()
    {
    	$this->user_roles = [];
    	$this->user_permissions = [];

    	$roles = $this->roles()->with('permissions')->get();
    	$permissions = $this->permissions()->get();

    	foreach ($roles as $role) {
    		$this->user_roles[] = $role->code;
    		if ($role->permissions) {
	    		foreach ($role->permissions as $permission) {
	    			$this->user_permissions[] = $permission->code;
	    		}
	    	}
    	}

		foreach ($permissions as $permission) {
			$this->user_permissions[] = $permission->code;
		}
    }

    public function hasRoles(array $roles)
    {
    	if ($this->user_roles === null) {
    		$this->parseRolesAndPermissions();
    	}

        return collect($roles)->diff($this->user_roles)->count() === 0;
    }

    public function hasPermissions(array $permissions)
    {
    	if ($this->user_permissions === null) {
    		$this->parseRolesAndPermissions();
    	}

        return collect($permissions)->diff($this->user_permissions)->count() === 0;
    }
}