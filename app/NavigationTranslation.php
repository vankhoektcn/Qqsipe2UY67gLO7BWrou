<?php

namespace App;

class NavigationTranslation extends BaseModel
{
    protected $table = "navigation_translations";
	protected $fillable = ['navigation_id', 'locale', 'name', 'summary', 'link'];
	public $timestamps = false;
	public static $rules = [
		'name' => 'required|max:250',
		'summary' => 'max:500',
		'link' => 'max:250'
	];

	public function navigation()
	{
		return $this->belongsTo('App\Navigation');
	}
}
