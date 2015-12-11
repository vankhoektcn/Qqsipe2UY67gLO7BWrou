<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Province;

class District extends BaseModel
{
     use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "districts";
	protected $fillable = ['key', 'priority', 'is_publish', 'created_by', 'updated_by'];
	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name'];
	protected $dates = ['deleted_at'];

	public function province()
    {
        return $this->belongsTo('App\Province');
    }
	public function translations()
	{
		return $this->hasMany('App\DistrictTranslation');
	}

	public function tutorRegisters()
	{
		return $this->belongsToMany('App\TutorRegister');
	}
}
