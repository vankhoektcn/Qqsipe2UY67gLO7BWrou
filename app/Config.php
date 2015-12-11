<?php

namespace App;

class Config extends BaseModel
{
    protected $table = "configs";
    protected $fillable = ['key', 'text', 'value'];
	public $timestamps = false;
	public static $rules = [
		//'key' => 'required|max:250',
		//'text' => 'required|max:250',
		'value' => 'required|max:250'
	];

	public function getValueByKey($key = '')
	{
		return $this->findByKey($key)->first()->value;
	}
}
