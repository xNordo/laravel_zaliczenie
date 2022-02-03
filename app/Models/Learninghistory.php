<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Learninghistory
 * 
 * @property int $id
 * @property int|null $practitioner_id
 * @property Carbon|null $date_from
 * @property Carbon|null $date_to
 * @property string|null $subject
 * @property string|null $place
 * @property int|null $place_type_id
 * @property int|null $hours
 * 
 * @property Practitioner|null $practitioner
 * @property Placetype|null $placetype
 *
 * @package App\Models
 */
class Learninghistory extends Model
{
	protected $table = 'learninghistory';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'practitioner_id' => 'int',
		'place_type_id' => 'int',
		'hours' => 'int'
	];

	protected $dates = [
		'date_from',
		'date_to'
	];

	protected $fillable = [
		'practitioner_id',
		'date_from',
		'date_to',
		'subject',
		'place',
		'place_type_id',
		'hours'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}

	public function placetype()
	{
		return $this->belongsTo(Placetype::class, 'place_type_id');
	}
}
