<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product_type extends BaseModel
{
	use SoftDeletes;
	
	protected $table = "product_types";

	public static $rules = [
		'priority' => 'integer',
		'active' => 'boolean'
	];

	protected $dates = ['deleted_at'];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

	public function getLink()
	{
		return route('product_type', ['typekey' => $this->key]);
	}

	public function getProductsByTypeKey($typeKey = '', $limit = 0)
	{
		$product_type = Product_type::where('key',$typeKey)->first();
		if (isset($product_type) && !is_null($product_type)) {
			if ($limit == 0) {
				return $product_type->products()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			}
			else{
				return $product_type->products()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take($limit)->get();
			}
		}
		return [];
	}
}
