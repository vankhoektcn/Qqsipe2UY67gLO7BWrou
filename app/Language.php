<?php

namespace App;

class Language extends BaseModel
{
	protected $table = "languages";
	protected $fillable = ['code', 'name', 'priority', 'is_default', 'is_key_language'];
	public $timestamps = false;
}
