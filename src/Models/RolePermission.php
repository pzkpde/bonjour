<?php

namespace Bonjour\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
	public $table = 'role_permission';
}