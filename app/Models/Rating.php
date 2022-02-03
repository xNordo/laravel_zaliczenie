<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rating
 * 
 * @property int $id
 * @property int|null $rating
 * @property string|null $comment
 * @property int|null $cooperation_id
 * 
 * @property Cooperation|null $cooperation
 *
 * @package App\Models
 */
class Rating extends Model
{
	protected $table = 'rating';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'rating' => 'int',
		'cooperation_id' => 'int'
	];

	protected $fillable = [
		'rating',
		'comment',
		'cooperation_id'
	];

	public function cooperation()
	{
		return $this->belongsTo(Cooperation::class);
	}
}
