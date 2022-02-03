<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activitytype
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Cdvactivity[] $cdvactivities
 *
 * @package App\Models
 */
class Activitytype extends Model
{
	protected $table = 'activitytype';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function cdvactivities()
	{
		return $this->hasMany(Cdvactivity::class, 'activity_type_id');
	}
}
