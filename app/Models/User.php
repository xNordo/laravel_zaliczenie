<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property bool $gender
 * @property Carbon $birthday
 * @property string $avatar
 * @property int $activity_id
 * @property Carbon|null $last_login
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';

	protected $casts = [
		'gender' => 'bool',
		'activity_id' => 'int'
	];

	protected $dates = [
		'birthday',
		'last_login'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'name',
		'surname',
		'password',
		'gender',
		'birthday',
		'avatar',
		'activity_id',
		'last_login'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'userrole');
	}
}
