<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cdvsubject
 * 
 * @property int $id
 * @property int $field_of_study_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $study_mode_id
 * 
 * @property Fieldofstudy $fieldofstudy
 * @property Studymode|null $studymode
 * @property Collection|Cooperation[] $cooperations
 *
 * @package App\Models
 */
class Cdvsubject extends Model
{
	protected $table = 'cdvsubject';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'field_of_study_id' => 'int',
		'study_mode_id' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'study_mode_id'
	];

	public function fieldofstudy()
	{
		return $this->belongsTo(Fieldofstudy::class, 'field_of_study_id');
	}

	public function studymode()
	{
		return $this->belongsTo(Studymode::class, 'study_mode_id');
	}

	public function cooperations()
	{
		return $this->hasMany(Cooperation::class, 'subject_id');
	}
}
