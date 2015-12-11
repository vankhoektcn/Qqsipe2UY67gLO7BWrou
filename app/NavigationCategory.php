<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class NavigationCategory extends BaseModel
{
	use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "navigation_categories";

	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name', 'summary'];
	protected $dates = ['deleted_at'];

	public function parent()
	{
		return $this->belongsTo('App\NavigationCategory', 'parent_id');
	}

	public function children()
	{
		return $this->hasMany('App\NavigationCategory', 'parent_id');
	}

	public function navigations()
	{
		return $this->hasMany('App\Navigation');
	}

	public function translations()
	{
		return $this->hasMany('App\NavigationCategoryTranslation');
	}
}
