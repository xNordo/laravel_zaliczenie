<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EducationHistory
 *
 * @property int $id
 * @property int|null $practitioner_id
 * @property string|null $degree
 * @property string|null $specialisation
 * @property bool|null $certificate
 *
 * @property Practitioner|null $practitioner
 *
 * @package App\Models
 */
class EducationHistory extends Model
{
	protected $table = 'educationhistory';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'practitioner_id' => 'int',
		'certificate' => 'bool'
	];

	protected $fillable = [
		'practitioner_id',
		'degree',
		'specialisation',
		'certificate'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}
}
