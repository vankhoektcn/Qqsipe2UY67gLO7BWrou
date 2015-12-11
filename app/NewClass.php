<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class NewClass extends BaseModel
{
    use SoftDeletes;

	protected $table = "new_class";
	protected $fillable = ['code','name','address','salary', 'priority', 'is_publish', 'created_by', 'updated_by'];
	public static $rules = [
		'code' => 'required|max:50',
		'name' => 'required|max:250',
		'address' => 'required|max:500',
		'time' => 'required|max:250',		
		'is_publish' => 'boolean'
	];
	protected $dates = ['deleted_at'];

	public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
