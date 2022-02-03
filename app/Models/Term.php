<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Term
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $date_start
 * @property Carbon|null $date_end
 * 
 * @property Collection|Cooperation[] $cooperations
 *
 * @package App\Models
 */
class Term extends Model
{
	protected $table = 'term';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'date_start',
		'date_end'
	];

	protected $fillable = [
		'name',
		'date_start',
		'date_end'
	];

	public function cooperations()
	{
		return $this->hasMany(Cooperation::class);
	}
}
