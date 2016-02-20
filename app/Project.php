<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends BaseModel
{
    use SoftDeletes;

	protected $table = "projects";
    protected $fillable = ['key', 'priority', 'active', 'created_by', 'updated_by'];
    public static $rules = [
        'priority' => 'integer',
        'is_publish' => 'boolean'
    ];

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
        $district_key = $this->district->key;
        $link = route('project', ['districtkey' => $district_key, 'projectkey' => $this->key]);
        return $link;
    }

    public function getFirstAttachment()
    {
        $images = $this->project_images()->where('active', 1)->orderBy('priority')->first();
        $thumnail = "/uploads/notfound.jpg" ;
        if(isset($images))
            $thumnail = $images->path;
        return $thumnail;
    }
}
