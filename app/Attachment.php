<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends BaseModel
{
	use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "attachments";
	protected $fillable = ['entry_id', 'table_name', 'path', 'priority', 'is_publish'];
	public static $rules = [
		'entry_id' => 'required|integer',
		'table_name' => 'required|max:50',
		'path' => 'required|max:250',
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];
	public $translatedAttributes = ['description'];
	protected $dates = ['deleted_at'];

	public function translations()
	{
		return $this->hasMany('App\AttachmentTranslation');
	}
}
