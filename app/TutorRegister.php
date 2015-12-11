<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class TutorRegister extends BaseModel
{
	use SoftDeletes;

	protected $table = "tutor_registers";
	protected $fillable = ['name', 'priority', 'is_publish', 'updated_by'];
	public static $rules = [
		'name' => 'required|max:250',
		'email' => 'required|max:250',
		'mobile' => 'required|max:250',
		'company' => 'max:250',
		'other_require' => 'max:500'
	];
	protected $dates = ['deleted_at'];

	public function district()
    {
        return $this->belongsTo('App\District');
    }

	public function subjects()
	{
		return $this->belongsToMany('App\Subject');
	}
	public function teachTimes()
	{
		return $this->belongsToMany('App\TeachTime');
	}	
	public function districts()
	{
		return $this->belongsToMany('App\District');
	}

	public function getStudyTime()
	{
		$strValue = null;
		foreach ($this->teachTimes as $key => $teachtime) {
			$typeName = $teachtime->type == 'S' ? 'Sáng ' : ($teachtime->type == 'C' ? 'Chiều ' : 'Tối ');
			$strValue = is_null($strValue) ? $typeName.$teachtime->key : $strValue.', '.$typeName.$teachtime->key;
		}
		return $strValue;
	}
}
