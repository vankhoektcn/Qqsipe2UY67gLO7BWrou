<?php

namespace App;

class ArticleTranslation extends BaseModel
{
	protected $table = "article_translations";
	protected $fillable = ['article_id', 'locale', 'name', 'summary', 'content', 'meta_description', 'meta_keywords'];
	public $timestamps = false;
	public static $rules = [
		'name' => 'required|max:250',
		'summary' => 'max:500',
		'content' => 'required',
		'meta_description' => 'max:500',
		'meta_keywords' => 'max:500'
	];

	public function article()
	{
		return $this->belongsTo('App\Article');
	}
}
