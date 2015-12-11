<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class TeachTime extends BaseModel
{
	use SoftDeletes;

	protected $table = "teach_times";
	protected $fillable = ['key', 'priority', 'is_publish', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];
	protected $dates = ['deleted_at'];

	
	public function tutorRegisters()
	{
		return $this->belongsToMany('App\TutorRegister');
	}
	
	public function studentRegisters()
	{
		return $this->belongsToMany('App\StudentRegister');
	}
}
