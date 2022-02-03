<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Practitionercompany
 * 
 * @property int $practitioner_id
 * @property int $comany_id
 * @property string|null $position
 * @property bool|null $is_owner
 * 
 * @property Practitioner $practitioner
 * @property Company $company
 *
 * @package App\Models
 */
class Practitionercompany extends Model
{
	protected $table = 'practitionercompany';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'practitioner_id' => 'int',
		'comany_id' => 'int',
		'is_owner' => 'bool'
	];

	protected $fillable = [
		'position',
		'is_owner'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class, 'comany_id');
	}
}
