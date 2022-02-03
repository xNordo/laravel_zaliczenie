<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Practitioner
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $email
 * @property string|null $cdv_email
 * @property string|null $phoneNo
 * @property string|null $cv
 * @property string|null $practitioner_card
 * @property Carbon $created_at
 * @property int|null $thesis
 * @property int|null $commercial_projects_hours
 * @property string|null $linkedin
 * @property int|null $commercial_experience_years
 * @property bool|null $participation_in_finished_project
 * @property bool|null $team_management
 * @property int|null $publications
 * 
 * @property Collection|Cdvactivity[] $cdvactivities
 * @property Collection|Contactsource[] $contactsources
 * @property Collection|Cooperation[] $cooperations
 * @property Collection|Educationhistory[] $educationhistories
 * @property Collection|Learninghistory[] $learninghistories
 * @property Collection|Practitioneravalability[] $practitioneravalabilities
 * @property Collection|Company[] $companies
 * @property Collection|Language[] $languages
 * @property Collection|Reference[] $references
 *
 * @package App\Models
 */
class Practitioner extends Model
{
	protected $table = 'practitioner';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'thesis' => 'int',
		'commercial_projects_hours' => 'int',
		'commercial_experience_years' => 'int',
		'participation_in_finished_project' => 'bool',
		'team_management' => 'bool',
		'publications' => 'int'
	];

	protected $fillable = [
		'name',
		'surname',
		'email',
		'cdv_email',
		'phoneNo',
		'cv',
		'practitioner_card',
		'thesis',
		'commercial_projects_hours',
		'linkedin',
		'commercial_experience_years',
		'participation_in_finished_project',
		'team_management',
		'publications'
	];

	public function cdvactivities()
	{
		return $this->hasMany(Cdvactivity::class);
	}

	public function contactsources()
	{
		return $this->hasMany(Contactsource::class, 'reference_practitioner');
	}

	public function cooperations()
	{
		return $this->hasMany(Cooperation::class);
	}

	public function educationhistories()
	{
		return $this->hasMany(Educationhistory::class);
	}

	public function learninghistories()
	{
		return $this->hasMany(Learninghistory::class);
	}

	public function practitioneravalabilities()
	{
		return $this->hasMany(Practitioneravalability::class);
	}

	public function companies()
	{
		return $this->belongsToMany(Company::class, 'practitionercompany', 'practitioner_id', 'comany_id')
					->withPivot('position', 'is_owner');
	}

	public function languages()
	{
		return $this->belongsToMany(Language::class, 'practitionerlanguage');
	}

	public function references()
	{
		return $this->hasMany(Reference::class);
	}
}
