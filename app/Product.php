<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

	protected $table = "products";
    protected $fillable = ['key', 'priority', 'active', 'created_by', 'updated_by'];
    public static $rules = [
        'priority' => 'integer',
        'active' => 'boolean'
    ];

	protected $dates = ['deleted_at'];


    public function product_type()
    {
        return $this->belongsTo('App\Product_type');
    }

    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    
	public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function ward()
    {
        return $this->belongsTo('App\Ward');
    }
    
    public function street()
    {
        return $this->belongsTo('App\Street');
    }
    
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function attachments()
    {
        return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'products');
    }
    
    public function getFirstAttachment()
    {
        $attachment = $this->attachments()->where('is_publish', 1)->orderBy('priority')->first();
        $thumnail = "/uploads/notfound.jpg" ;
        if(isset($attachment))
            $thumnail = $attachment->path;
        return $thumnail;
    }
    public function getLink()
    {
        $district_key = $this->district->key;
        $link = route('product', ['districtkey' => $district_key, 'productkey' => $this->key]);
        return $link;
    }

    public function addressFull()
    {
        $province = $this->district->province;
        $address = $this->address . ', ' . $this->district->name . ', ' . $province->name;
        return $address;
    }

}
