<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fieldofstudy
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Cdvsubject[] $cdvsubjects
 *
 * @package App\Models
 */
class Fieldofstudy extends Model
{
	protected $table = 'fieldofstudy';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function cdvsubjects()
	{
		return $this->hasMany(Cdvsubject::class, 'field_of_study_id');
	}
}
