<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $id_status
 * @property string $dsc
 * 
 * @property Collection|TskTask[] $tsk_tasks
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	protected $primaryKey = 'id_status';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_status' => 'int'
	];

	protected $fillable = [
		'dsc'
	];

	public function tsk_tasks()
	{
		return $this->hasMany(TskTask::class, 'id_status');
	}
}
