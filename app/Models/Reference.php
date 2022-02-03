<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reference
 * 
 * @property int $id
 * @property int|null $practitioner_id
 * @property string|null $path
 * 
 * @property Practitioner|null $practitioner
 *
 * @package App\Models
 */
class Reference extends Model
{
	protected $table = 'references';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'practitioner_id' => 'int'
	];

	protected $fillable = [
		'practitioner_id',
		'path'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}
}
