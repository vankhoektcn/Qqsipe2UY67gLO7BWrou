<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends BaseModel
{
    use SoftDeletes;

    protected $table = "contacts";
    protected $fillable = ['full_name', 'email', 'phone', 'subject', 'content'];
	public static $rules = [
		'full_name' => 'required|max:50',
		'email' => 'required|email|max:50',
		'phone' => 'required|max:20',
		'subject' => 'required|max:250',
		'content' => 'required|max:500'
	];

	protected $dates = ['deleted_at'];
}
