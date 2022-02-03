<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Practitioneravalability
 * 
 * @property int $availability_type_id
 * @property int $practitioner_id
 * @property float|null $rate_per_hour
 * 
 * @property Practitioner $practitioner
 * @property Availabilitytype $availabilitytype
 *
 * @package App\Models
 */
class Practitioneravalability extends Model
{
	protected $table = 'practitioneravalability';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'availability_type_id' => 'int',
		'practitioner_id' => 'int',
		'rate_per_hour' => 'float'
	];

	protected $fillable = [
		'rate_per_hour'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}

	public function availabilitytype()
	{
		return $this->belongsTo(Availabilitytype::class, 'availability_type_id');
	}
}
