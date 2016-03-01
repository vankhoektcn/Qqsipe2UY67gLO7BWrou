<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Province;

class Ward extends BaseModel
{
     use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "wards";
	protected $fillable = ['key', 'priority', 'active', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];

	protected $dates = ['deleted_at'];

	public function district()
    {
        return $this->belongsTo('App\District');
    }
    
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
