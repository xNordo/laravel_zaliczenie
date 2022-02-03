<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * 
 * @property int $activity_id
 * @property string $description
 *
 * @package App\Models
 */
class Activity extends Model
{
	protected $table = 'activity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activity_id' => 'int'
	];

	protected $fillable = [
		'activity_id',
		'description'
	];
}
