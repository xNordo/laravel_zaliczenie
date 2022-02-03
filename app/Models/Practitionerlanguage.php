<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Practitionerlanguage
 * 
 * @property int $practitioner_id
 * @property int $language_id
 * 
 * @property Language $language
 * @property Practitioner $practitioner
 *
 * @package App\Models
 */
class Practitionerlanguage extends Model
{
	protected $table = 'practitionerlanguage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'practitioner_id' => 'int',
		'language_id' => 'int'
	];

	public function language()
	{
		return $this->belongsTo(Language::class);
	}

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}
}
