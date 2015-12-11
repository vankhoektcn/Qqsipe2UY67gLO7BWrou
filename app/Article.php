<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\ArticleCategory;

class Article extends BaseModel
{
	use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "articles";
	protected $fillable = ['key', 'priority', 'is_publish', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name', 'summary', 'content', 'meta_description', 'meta_keywords'];
	protected $dates = ['deleted_at'];

	public function categories()
	{
		return $this->belongsToMany('App\ArticleCategory');
	}

	public function attachments()
	{
		return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'articles');
	}

	public function translations()
	{
		return $this->hasMany('App\ArticleTranslation');
	}

	public function getLink()
	{
		$categorykey = "bai-viet";
		$positionParent = ArticleCategory::where('key','vi-tri-bai-viet')->first();
		if(isset($positionParent))
		{
			$arrayPosId = $positionParent->children->lists('id');
			$category = $this->categories()->whereNotIn('id', $arrayPosId)->first();
			if(isset($category))
				$categorykey = $category->key;
		}

		$link = route('article', ['categorykey' => $categorykey, 'articlekey' => $this->key]);
		return $link;
	}

	public function getFirstAttachment()
	{
		$attachment = $this->attachments()->where('is_publish', 1)->orderBy('priority')->first();
		$thumnail = "/uploads/notfound.jpg" ;
		if(isset($attachment))
			$thumnail = $attachment->path;
		return $thumnail;
	}

	public static function specialArticleLink($linkKey)
	{
		$link = route('article', ['categorykey' => app()->getLocale(), 'articlekey' => $linkKey]);
		return $link;
	}
}

