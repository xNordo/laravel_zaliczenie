<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Studymode
 * 
 * @property int $id
 * @property string|null $mode
 * 
 * @property Collection|Cdvsubject[] $cdvsubjects
 *
 * @package App\Models
 */
class Studymode extends Model
{
	protected $table = 'studymode';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'mode'
	];

	public function cdvsubjects()
	{
		return $this->hasMany(Cdvsubject::class, 'study_mode_id');
	}
}
