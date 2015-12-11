<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends BaseModel
{
	use \Dimsav\Translatable\Translatable;
	use SoftDeletes;
	
	protected $table = "article_categories";

	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name', 'summary', 'meta_description', 'meta_keywords'];
	protected $dates = ['deleted_at'];

	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}

	public function attachments()
	{
		return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'article_categories');
	}

	public function parent()
    {
        return $this->belongsTo('App\ArticleCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\ArticleCategory', 'parent_id');
    }

	public function translations()
	{
		return $this->hasMany('App\ArticleCategoryTranslation');
	}

	public function getLink()
	{
		return route('category', ['categorykey' => $this->key]);
	}

	public function getAllTopLevel()
	{
		$arrayPosId = ArticleCategory::where('key','vi-tri-bai-viet')->lists('id');
		$allTopLevel = ArticleCategory::where('parent_id','=',0)->where('is_publish',1)->whereNotIn('id',$arrayPosId)->orderBy('priority')->get();
		return $allTopLevel;
	}


	public function getArticlesByCategoryKey($categoryKey = '', $limit = 0)
	{
		$articleCategory = ArticleCategory::where('key',$categoryKey)->first();
		if (isset($articleCategory) && !is_null($articleCategory)) {
			if ($limit == 0) {
				return $articleCategory->articles()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			}
			else{
				return $articleCategory->articles()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->take($limit)->get();
			}
		}
		return [];
	}
}
