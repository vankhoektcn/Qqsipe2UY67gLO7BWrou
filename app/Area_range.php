<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Area_range extends BaseModel
{
    use SoftDeletes;

	protected $table = "area_ranges";
	protected $fillable = ['name', 'priority', 'active', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];
	protected $dates = ['deleted_at'];

	
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
