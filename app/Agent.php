<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends BaseModel
{
    use SoftDeletes;

	protected $table = "agents";

	protected $dates = ['deleted_at'];


	public function projects()
	{
		return $this->belongsToMany('App\Project');
	}
}
