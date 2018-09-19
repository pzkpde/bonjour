<?php

namespace Bonjour\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
	public $table = 'user_role';
}