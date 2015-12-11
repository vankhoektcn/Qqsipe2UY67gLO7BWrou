<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationCategoryTranslation extends BaseModel
{
    protected $table = "navigation_category_translations";
	public $timestamps = false;

	public static $rules = [
		'name' => 'required|max:250',
		'summary' => 'max:500'
	];

	public function navigationCategory()
	{
		return $this->belongsTo('App\NavigationCategory');
	}
}
