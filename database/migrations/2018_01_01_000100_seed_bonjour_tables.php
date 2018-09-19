<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Bonjour\Models\{
    User, Role, Permission
};

class SeedBonjourTables extends Migration
{
    public function up()
    {
        global $argv;
        if (in_array('--seed', $argv) === false) {
            return false;
        }

        // Make users

        $user_admin = User::create([
            'name' => 'admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('admin'),
        ]);

        $user_moderator = User::create([
            'name' => 'moderator',
            'email' => 'moderator@domain.com',
            'password' => bcrypt('moderator'),
        ]);

        // Make roles

        $role_admin = Role::create([
            'code' => 'admin',
            'name' => 'Administrator',
            'description' => 'Full access to backend',
        ]);

        $role_moderator = Role::create([
            'code' => 'moderator',
            'name' => 'Moderator',
            'description' => 'Strict access to backend',
        ]);

        // Make permissions

        $permission_allow_backend = Permission::create([
            'code' => 'allow_backend',
            'name' => 'Allow backend',
            'description' => 'Allow access to backaend',
        ]);

        $permission_allow_user_management = Permission::create([
            'code' => 'allow_user_management',
            'name' => 'Allow user management',
            'description' => 'Allow access to manage users',
        ]);

        $permission_allow_create_content = Permission::create([
            'code' => 'allow_create_content',
            'name' => 'Allow create content',
            'description' => 'Allow access to creating content',
        ]);

        // Attach roles to users

        $user_admin->roles()->attach([$role_admin->id, $role_moderator->id]);
        $user_moderator->roles()->attach($role_moderator->id);

        // Attach permissions to roles

        $role_admin->permissions()->attach([$permission_allow_backend->id, $permission_allow_user_management->id]);
        $role_moderator->permissions()->attach($permission_allow_create_content->id);

        // Attach permissions to users

        $user_admin->permissions()->attach($permission_allow_create_content->id);
    }

    public function down()
    {
    }
}