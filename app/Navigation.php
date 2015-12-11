<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Navigation extends BaseModel
{
    use \Dimsav\Translatable\Translatable;
	use SoftDeletes;

	protected $table = "navigations";

	public static $rules = [
		'priority' => 'integer',
		'is_publish' => 'boolean'
	];

	public $translatedAttributes = ['name', 'summary', 'link'];
	protected $dates = ['deleted_at'];

	public function navigationCategory()
    {
        return $this->belongsTo('App\NavigationCategory');
    }

	public function translations()
	{
		return $this->hasMany('App\NavigationTranslation');
	}

	public function attachments()
	{
		return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'navigations');
	}

	public function getFirstAttachment()
	{
		$attachment = $this->attachments()->where('is_publish', 1)->orderBy('priority')->first();
		$thumnail = "/uploads/notfound.jpg" ;
		if(isset($attachment))
			$thumnail = $attachment->path;
	    return $thumnail;
	}
}
