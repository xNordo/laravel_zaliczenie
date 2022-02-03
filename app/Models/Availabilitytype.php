<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Availabilitytype
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Practitioneravalability[] $practitioneravalabilities
 *
 * @package App\Models
 */
class Availabilitytype extends Model
{
	protected $table = 'availabilitytype';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function practitioneravalabilities()
	{
		return $this->hasMany(Practitioneravalability::class, 'availability_type_id');
	}
}
