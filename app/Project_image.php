<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project_image extends BaseModel
{
    use SoftDeletes;

	protected $table = "project_images";

	protected $dates = ['deleted_at'];


	public function project()
	{
		return $this->Project_image('App\Project');
	}
}
