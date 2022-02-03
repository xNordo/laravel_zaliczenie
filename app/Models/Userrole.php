<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Userrole
 * 
 * @property int $user_id
 * @property int $role_id
 * 
 * @property Role $role
 * @property User $user
 *
 * @package App\Models
 */
class Userrole extends Model
{
	protected $table = 'userrole';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
