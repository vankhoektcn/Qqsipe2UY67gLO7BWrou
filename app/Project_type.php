<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project_type extends BaseModel
{
	use SoftDeletes;
	
	protected $table = "project_types";

	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];

	protected $dates = ['deleted_at'];

	public function projects()
	{
		return $this->hasMany('App\Project');
	}

	public function getLink()
	{
		return route('project_type', ['project_type_key' => $this->key]);
	}

	public function getProjectsByTypeKey($typeKey = '', $limit = 0)
	{
		$project_type = Project_type::where('key',$typeKey)->first();
		if (isset($project_type) && !is_null($project_type)) {
			if ($limit == 0) {
				return $project_type->projects()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			}
			else{
				return $project_type->projects()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take($limit)->get();
			}
		}
		return [];
	}
}
