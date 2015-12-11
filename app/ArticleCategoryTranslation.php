<?php

namespace App;

class ArticleCategoryTranslation extends BaseModel
{
	protected $table = "article_category_translations";
	public $timestamps = false;

	public static $rules = [
		'name' => 'required|max:250',
		'summary' => 'max:500',
		'meta_description' => 'max:500',
		'meta_keywords' => 'max:500'
	];

	public function articleCategory()
	{
		return $this->belongsTo('App\ArticleCategory');
	}
}
