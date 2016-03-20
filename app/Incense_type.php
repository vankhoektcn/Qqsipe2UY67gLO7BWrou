<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Incense_type extends BaseModel
{
    use SoftDeletes;

	protected $table = "incense_types";
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
