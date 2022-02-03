<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cdvactivity
 * 
 * @property int $activity_type_id
 * @property int $practitioner_id
 * @property Carbon|null $date_from
 * @property Carbon|null $date_to
 * @property string|null $description
 * 
 * @property Activitytype $activitytype
 * @property Practitioner $practitioner
 *
 * @package App\Models
 */
class Cdvactivity extends Model
{
	protected $table = 'cdvactivity';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'activity_type_id' => 'int',
		'practitioner_id' => 'int'
	];

	protected $dates = [
		'date_from',
		'date_to'
	];

	protected $fillable = [
		'date_from',
		'date_to',
		'description'
	];

	public function activitytype()
	{
		return $this->belongsTo(Activitytype::class, 'activity_type_id');
	}

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}
}
