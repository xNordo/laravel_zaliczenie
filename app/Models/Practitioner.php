<?php

declare(strict_types=1);

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
 * @property Collection|EducationHistory[] $educationHistories
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

	public function educationHistories()
    {
        return $this->hasMany(EducationHistory::class);
    }
}
