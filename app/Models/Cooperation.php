<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cooperation
 * 
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $practitioner_id
 * @property int|null $term_id
 * @property int|null $hours
 * 
 * @property Cdvsubject|null $cdvsubject
 * @property Practitioner|null $practitioner
 * @property Term|null $term
 * @property Cooperation|null $cooperation
 * @property Collection|Cooperation[] $cooperations
 * @property Collection|Rating[] $ratings
 *
 * @package App\Models
 */
class Cooperation extends Model
{
	protected $table = 'cooperation';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'subject_id' => 'int',
		'practitioner_id' => 'int',
		'term_id' => 'int',
		'hours' => 'int'
	];

	protected $fillable = [
		'subject_id',
		'practitioner_id',
		'term_id',
		'hours'
	];

	public function cdvsubject()
	{
		return $this->belongsTo(Cdvsubject::class, 'subject_id');
	}

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class);
	}

	public function term()
	{
		return $this->belongsTo(Term::class);
	}

	public function cooperation()
	{
		return $this->belongsTo(Cooperation::class, 'practitioner_id', 'term_id');
	}

	public function cooperations()
	{
		return $this->hasMany(Cooperation::class, 'practitioner_id', 'term_id');
	}

	public function ratings()
	{
		return $this->hasMany(Rating::class);
	}
}
