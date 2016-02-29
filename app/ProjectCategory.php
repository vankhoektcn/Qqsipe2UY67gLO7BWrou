<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends BaseModel
{
	use SoftDeletes;
	
	protected $table = "project_categories";

	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];

	public $translatedAttributes = ['name', 'summary', 'meta_description', 'meta_keywords'];
	protected $dates = ['deleted_at'];

	public function projects()
	{
		return $this->belongsToMany('App\Project');
	}

	public function attachments()
	{
		return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'project_categories');
	}
	
	public function parent()
    {
        return $this->belongsTo('App\ProjectCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\ProjectCategory', 'parent_id');
    }

	public function getLink()
	{
		return route('category', ['categorykey' => $this->key]);
	}

	public function getAllTopLevel()
	{
		$arrayPosId = ProjectCategory::where('key','vi-tri-bai-viet')->lists('id');
		$allTopLevel = ProjectCategory::where('parent_id','=',0)->where('active',1)->whereNotIn('id',$arrayPosId)->orderBy('priority')->get();
		return $allTopLevel;
	}


	public function getProjectsByCategoryKey($categoryKey = '', $limit = 0)
	{
		$projectCategory = ProjectCategory::where('key',$categoryKey)->first();
		if (isset($projectCategory) && !is_null($projectCategory)) {
			if ($limit == 0) {
				return $projectCategory->projects()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			}
			else{
				return $projectCategory->projects()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take($limit)->get();
			}
		}
		return [];
	}
}
