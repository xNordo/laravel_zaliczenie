<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Placetype
 * 
 * @property int $id
 * @property string|null $name
 * 
 * @property Collection|Learninghistory[] $learninghistories
 *
 * @package App\Models
 */
class Placetype extends Model
{
	protected $table = 'placetype';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];

	public function learninghistories()
	{
		return $this->hasMany(Learninghistory::class, 'place_type_id');
	}
}
