<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Practitioner[] $practitioners
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'language';
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
		return $this->belongsToMany(Practitioner::class, 'practitionerlanguage');
	}
}
