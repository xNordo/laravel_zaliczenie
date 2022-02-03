<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contactsource
 * 
 * @property int $contact_source_type_id
 * @property int $practitioner_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $reference_practitioner
 * 
 * @property Practitioner|null $practitioner
 * @property Contactsourcetype $contactsourcetype
 *
 * @package App\Models
 */
class Contactsource extends Model
{
	protected $table = 'contactsource';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'contact_source_type_id' => 'int',
		'practitioner_id' => 'int',
		'reference_practitioner' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'reference_practitioner'
	];

	public function practitioner()
	{
		return $this->belongsTo(Practitioner::class, 'reference_practitioner');
	}

	public function contactsourcetype()
	{
		return $this->belongsTo(Contactsourcetype::class, 'contact_source_type_id');
	}
}
