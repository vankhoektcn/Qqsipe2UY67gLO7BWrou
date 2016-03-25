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
        'active' => 'boolean'
    ];

	protected $dates = ['deleted_at'];


    public function categories()
    {
        return $this->belongsToMany('App\ProjectCategory');
    }
    public function project_type()
    {
        return $this->belongsTo('App\Project_type');
    }
    
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
	public function district()
    {
        return $this->belongsTo('App\District');
    }    
    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }    
    public function street()
    {
        return $this->belongsTo('App\Street');
    }
    
	public function agents()
	{
		return $this->belongsToMany('App\Agent');
	}	
    public function products()
    {
        return $this->hasMany('App\Product');
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
        // $district_key = $this->district->key;
        $link = route('project_detail', ['project_id' => $this->id, 'project_key' => $this->key]);
        return $link;
    }

    public function addressFull()
    {
        $address = $this->address;
        if(isset($this->street->id))
            $address .= ', '. $this->street->name. ', '. $this->ward->name. ', '. $this->district->name . ', ' . $this->province->name;
        else if(isset($this->ward->id))
            $address .= ', '. $this->ward->name. ', '. $this->district->name . ', ' . $this->province->name;
        else if(isset($this->district->id))
            $address .= ', '. $this->district->name . ', ' . $this->province->name;

        return $address;
    }

    public function getFirstImage()
    {
        $images = $this->project_images()->where('active', 1)->orderBy('priority')->first();
        $thumnail = "/uploads/notfound.jpg" ;
        if(isset($images))
            $thumnail = $images->path;
        return $thumnail;
    }
}
