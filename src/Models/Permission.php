<?php

namespace Bonjour\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $fillable = [
    	'code', 'name', 'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,
            'role_permission', 'permission_id', 'role_id'
        );
    }
}