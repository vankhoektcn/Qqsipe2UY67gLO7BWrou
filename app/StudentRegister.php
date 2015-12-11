<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class StudentRegister extends BaseModel
{
    use SoftDeletes;

	protected $table = "student_registers";
	protected $fillable = ['name', 'priority', 'is_publish', 'updated_by'];
	public static $rules = [
		'name' => 'required|max:250',
		'email' => 'required|max:250',
		'mobile' => 'required|max:250',
		'school' => 'max:250',
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

	public function getClassName()
	{
		$value = null;
		switch ($this->class) {
			case 0:
			$value = 'Mẫu giáo';
			break;
			case 1:
			$value = 'Lớp 1';
			break;
			case 2:
			$value = 'Lớp 2';
			break;
			case 3:
			$value = 'Lớp 3';
			break;
			case 4:
			$value = 'Lớp 4';
			break;
			case 5:
			$value = 'Lớp 5';
			break;
			case 6:
			$value = 'Lớp 6';
			break;
			case 7:
			$value = 'Lớp 7';
			break;
			case 8:
			$value = 'Lớp 8';
			break;
			case 9:
			$value = 'Lớp 9';
			break;
			case 10:
			$value = 'Lớp 10';
			break;
			case 11:
			$value = 'Lớp 11';
			break;
			case 12:
			$value = 'Lớp 12';
			break;
			case 13:
			$value = 'Sinh viên';
			break;
			case 14:
			$value = 'Cán bộ CNVC';
			break;
			case 15:
			$value = 'Khác';
			break;
		}
		return $value;
	}
	public function getLevelName()
	{
		$value = null;
		switch ($this->level) {
			case 'Y':
			$value = 'Yếu';
			break;
			case 'T':
			$value = 'Trung bình';
			break;
			case 'K':
			$value = 'Khá';
			break;
			case 'G':
			$value = 'Giỏi';
			break;
			case 'X':
			$value = 'Xuất sắc';
			break;
		}
		return $value;
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
