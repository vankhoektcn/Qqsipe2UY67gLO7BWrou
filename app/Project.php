<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends BaseModel
{
    use SoftDeletes;

	protected $table = "projects";

	protected $dates = ['deleted_at'];


	public function district()
    {
        return $this->belongsTo('App\District');
    }
	public function agents()
	{
		return $this->belongsToMany('App\Agent');
	}	
	public function project_parts()
    {
        return $this->hasMany('App\Project_part');
    }
	public function project_images()
    {
        return $this->hasMany('App\Project_image');
    }

    public function getLink()
    {
        $project_alias = "du-an";
        $district_key = $this->district->key;
        $link = route('project', ['projectid' => $this->id,'districtkey' => $district_key, 'projectkey' => $this->key]);
        return $link;
    }
}
