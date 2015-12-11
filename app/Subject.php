<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends BaseModel
{
    use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "subjects";
	protected $fillable = ['key', 'priority', 'is_publish', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name'];
	protected $dates = ['deleted_at'];

	public function translations()
	{
		return $this->hasMany('App\SubjectTranslation');
	}

	
	public function tutorRegisters()
	{
		return $this->belongsToMany('App\TutorRegister');
	}

	public function studentRegisters()
	{
		return $this->belongsToMany('App\StudentRegister');
	}
}
