<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Practitioner[] $practitioners
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'company';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function practitioners()
	{
		return $this->belongsToMany(Practitioner::class, 'practitionercompany', 'comany_id')
					->withPivot('position', 'is_owner');
	}
}
