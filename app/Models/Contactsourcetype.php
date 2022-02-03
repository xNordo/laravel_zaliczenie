<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contactsourcetype
 * 
 * @property int $id
 * @property string|null $name
 * @property bool|null $require_practitioner
 * 
 * @property Collection|Contactsource[] $contactsources
 *
 * @package App\Models
 */
class Contactsourcetype extends Model
{
	protected $table = 'contactsourcetype';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'require_practitioner' => 'bool'
	];

	protected $fillable = [
		'name',
		'require_practitioner'
	];

	public function contactsources()
	{
		return $this->hasMany(Contactsource::class, 'contact_source_type_id');
	}
}
