<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Price_type extends BaseModel
{
    use SoftDeletes;

	protected $table = "price_types";
	protected $fillable = ['name', 'priority', 'active', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];
	protected $dates = ['deleted_at'];

}
