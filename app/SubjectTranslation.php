<?php

namespace App;

class SubjectTranslation extends BaseModel
{
    protected $table = "subject_translations";
	protected $fillable = ['subject_id', 'locale', 'name'];
	public $timestamps = false;
	public static $rules = [
		'name' => 'required|max:250'
	];

	public function subject()
	{
		return $this->belongsTo('App\Subject');
	}
}
