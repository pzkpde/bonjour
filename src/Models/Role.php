<?php

namespace Bonjour\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $fillable = [
        'code', 'name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,
            'user_role', 'role_id', 'user_id'
        );
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,
            'role_permission', 'role_id', 'permission_id'
        );
    }
}