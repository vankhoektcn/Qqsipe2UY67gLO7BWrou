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
		return route('type', ['typekey' => $this->key]);
	}

	public function getAllTopLevel()
	{
		$arrayPosId = Product_type::where('key','vi-tri-bai-viet')->lists('id');
		$allTopLevel = Product_type::where('parent_id','=',0)->where('active',1)->whereNotIn('id',$arrayPosId)->orderBy('priority')->get();
		return $allTopLevel;
	}

	public function getProductsByTypeKey($typeKey = '', $limit = 0)
	{
		$productType = Product_type::where('key',$typeKey)->first();
		if (isset($productType) && !is_null($productType)) {
			if ($limit == 0) {
				return $productType->products()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			}
			else{
				return $productType->products()->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take($limit)->get();
			}
		}
		return [];
	}
}
