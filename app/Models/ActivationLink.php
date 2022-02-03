<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ActivationLink
 * 
 * @property int $id_activation_link
 * @property string $user_email
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string $link
 *
 * @package App\Models
 */
class ActivationLink extends Model
{
	protected $table = 'activation_link';
	protected $primaryKey = 'id_activation_link';

	protected $fillable = [
		'user_email',
		'link'
	];
}
