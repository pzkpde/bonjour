<?php

namespace Bonjour\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPermission extends Pivot
{
	public $table = 'user_permission';
}