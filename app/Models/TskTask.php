<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TskTask
 * 
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $id_status
 * @property Carbon|null $due_date
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Status $status
 *
 * @package App\Models
 */
class TskTask extends Model
{
	protected $table = 'tsk_task';

	protected $casts = [
		'id_status' => 'int',
		'due_date' => 'datetime'
	];

	protected $fillable = [
		'title',
		'description',
		'id_status',
		'due_date'
	];

	public function status()
	{
		return $this->belongsTo(Status::class, 'id_status');
	}
}
