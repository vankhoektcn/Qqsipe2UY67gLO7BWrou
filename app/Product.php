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


    public function price_type()
    {
        return $this->belongsTo('App\Price_type');
    }

    public function price_range()
    {
        return $this->belongsTo('App\Price_range');
    }
    
    public function area_range()
    {
        return $this->belongsTo('App\Area_range');
    }
    
    public function incense_type()
    {
        return $this->belongsTo('App\Incense_type');
    }

    public function utilitys()
    {
        return $this->belongsToMany('App\Utility');
    }   

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attachments()
    {
        return $this->hasMany('App\Attachment', 'entry_id')->where('table_name', '=', 'products');
    }
    
    public function getThumnail()
    {
        $thumnail = "/uploads/notfound.jpg" ;
        if(isset($this->main_image))
            $thumnail = $this->main_image;
        else{  
            $attachment = $this->attachments()->where('is_publish', 1)->orderBy('priority')->first();
            if(isset($attachment))
                $thumnail = $attachment->path;
        }
        return $thumnail;
    }
    public function getLink()
    {
        $link = route('product_detail', ['product_id' => $this->id, 'product_key' => $this->key]);
        return $link;
    }

    public function addressFull()
    {
        $address = $this->address;
        if(isset($this->street->id))
            $address .= ', '. $this->street->name. ', '. $this->ward->name. ', '. $this->district->name . ', ' . $this->province->name;
        else if(isset($this->ward->id))
            $address .= ', '. $this->ward->name. ', '. $this->district->name . ', ' . $this->province->name;
        else if(isset($this->district->id))
            $address .= ', '. $this->district->name . ', ' . $this->province->name;

        return $address;
    }

}
