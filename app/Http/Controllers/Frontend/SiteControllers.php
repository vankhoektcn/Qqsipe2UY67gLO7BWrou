<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ArticleCategory;
use App\ProjectCategory;
use App\Article;
use App\Contact;
use App\ArticleCategoryTranslation;
use App\Language;
use App\District;
use App\Subject;
use App\TeachTime;
use App\TutorRegister;
use App\StudentRegister;
use App\NewClass;
use App\Common;
use App\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use OpenGraph;
use Twitter;
use SEOMeta;
use Image;
use Mail;

use App\Province;
use App\Project;
use App\Project_part;
use App\Product_type;
use App\Product;
use App\Agent;
use App\Ward;
use App\Street;
use App\Project_type;

use App\Price_type;
use App\Utility;
use App\Price_range;
use App\Incense_type;
use App\Area_range;

class SiteControllers extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->setMetadata();
		$provinces = Province::where('is_publish',1)->get();
		$projectCategory = new ProjectCategory;
		$projectsSpecial = null;//$projectCategory->getProjectsByCategoryKey('du-an-noi-bat', 3);
		$projectsNew = $projectCategory->getProjectsByCategoryKey('du-an-moi-nhat', 3);
		$product_types = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$agents = Agent::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take(4)->get();
		//$canHoChoThue = $product_type->getProductsByTypeKey('can-ho-sang-nhuong', 3);
		//$productAll = Product::where('active',1)->get();
		return view('frontend.sites1.index',[ 'provinces'=> $provinces,'projectsSpecial'=> $projectsSpecial, 'projectsNew'=> $projectsNew 
			, 'product_types'=> $product_types, 'agents'=> $agents ]);
	}

	public function project_search(Request $request)
	{
		$this->setMetadata('Tìm kiếm dự án');

		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$project_type_id = $request->input('project_type');			
		$province_id = $request->input('province');			
		$district_id = $request->input('district');			
		$ward_id = $request->input('ward');			
		$street_id = $request->input('street');

		$searchDescription = "";
		$project_type = null;
		$province = null;
		$district = null;
		$ward = null;
		$street = null;
		$query = Project::query();
		try{
			if(isset($project_type_id) && $project_type_id != "")
			{
				$query->where('project_type_id',$project_type_id);
				$project_type = Project_type::findOrFail($project_type_id);
				$searchDescription .= $project_type->name;
			}
			if(isset($province_id) && $province_id != "")
			{
				$query->where('province_id',$province_id);
				$province = Province::findOrFail($province_id);
				$searchDescription .= ", ". $province->name;
			}
			if(isset($district_id) && $district_id != "")
			{
				$query->where('district_id',$district_id);			
				$district = District::findOrFail($district_id);
				$searchDescription .= ", ". $district->name;
			}
			if(isset($ward_id) && $ward_id != "")
			{
				$query->where('ward_id',$ward_id);
				$ward = Ward::findOrFail($ward_id);
				$searchDescription .= ", ". $ward->name;
			}
			if(isset($street_id) && $street_id != "")
			{
				$query->where('street_id',$street_id);
				$street = Street::findOrFail($street_id);
				$searchDescription .= ", ". $street->name;
			}
		} catch(Exception $e){
		};
		$projects = $query->paginate($limit);
		$projectCategory = new ProjectCategory;
		$projectsSpecial = $projectCategory->getProjectsByCategoryKey('du-an-noi-bat', 5);
		$hcmProvince = Province::findByKey('ho-chi-minh')->first();
		// dd($hcmProvince->id);
		$districtProject = District::where('province_id','=', $hcmProvince->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		return view('frontend.sites1.project_search', ['projects'=> $projects, 'projectsSpecial'=> $projectsSpecial, 'districtProject' => $districtProject, 'searchDescription'=> $searchDescription]);
	}

	/******************************************************************************************************************
	 * F O R	  P R O D U C T
	 ******************************************************************************************************************/
	public function products( Request $request)
	{		
		$this->setMetadata('Tin rao căn hộ');
		$limit = Config::findByKey('rows_per_page_product')->first()->value;
		$searchDescription = 'Căn hộ';
		$link = route('products');
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class=""><a href="'.$link.'">căn hộ</a></li> 
		</ul>';
		$products = Product::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);

		$product_types = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$provinces = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$heading = 'Căn hộ';
		return view('frontend.sites1.product_search', ['products'=> $products,'provinces'=> $provinces, 'product_types'=>$product_types 
			, 'search_type'=> 'products', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PRODUCT_TYPE
	 */
	public function product_type($product_type_key, Request $request)
	{	
		$provinces = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$price_ranges = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$area_ranges = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$incense_types = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			
		$limit = Config::findByKey('rows_per_page_product')->first()->value;
		$product_type = Product_type::findByKey($product_type_key)->first();
		if(is_null($product_type) )
			$product_type = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();

		$products = $product_type->products()->where('active',1);
		$project_id = $request->input('project');			
		$price_range_id = $request->input('price');			
		$area_range_id = $request->input('area');			
		$incense_type_id = $request->input('incense');	

		if(isset($price_range_id) && $price_range_id != '')
			$products->where('price_range_id', $price_range_id);
	
		if(isset($area_range_id) && $area_range_id != '')
			$products->where('area_range_id', $area_range_id);
	
		if(isset($incense_type_id) && $incense_type_id != '')
			$products->where('incense_type_id', $incense_type_id);

		$products =$products->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $product_type->name;
		$link = route('product_type',['product_type_key'=> $product_type->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('products').'">Căn hộ</a></li> 
		<li class=""><a href="'.$link.'">'.$product_type->name.'</a></li> 
		</ul>';
		$heading = $product_type->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.product_search', ['products'=> $products, 'product_type'=>$product_type,'provinces'=> $provinces, 'price_ranges' => $price_ranges, 'area_ranges'=> $area_ranges, 'incense_types' => $incense_types
			, 'search_type'=> 'product_type', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PRODUCT_TYPE vs PROVINCE
	 */
	public function product_type_province($product_type_key, $province_key, Request $request)
	{	
		$province = Province::findByKey($province_key)->first();
		$districts = District::where('province_id', $province->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$price_ranges = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$area_ranges = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$incense_types = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			
		$limit = Config::findByKey('rows_per_page_product')->first()->value;
		$product_type = Product_type::findByKey($product_type_key)->first();
		if(is_null($product_type) )
			$product_type = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		
		if(is_null($province) )
			$province = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();

		$products = Product::where('product_type_id',$product_type->id)->where('province_id',$province->id)->where('active',1);
		$project_id = $request->input('project');			
		$price_range_id = $request->input('price');			
		$area_range_id = $request->input('area');			
		$incense_type_id = $request->input('incense');	

		if(isset($project_id) && $project_id != '')
			$products->where('project_id', $project_id);

		if(isset($price_range_id) && $price_range_id != '')
			$products->where('price_range_id', $price_range_id);
	
		if(isset($area_range_id) && $area_range_id != '')
			$products->where('area_range_id', $area_range_id);
	
		if(isset($incense_type_id) && $incense_type_id != '')
			$products->where('incense_type_id', $incense_type_id);

		$products =$products->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $product_type->name.' '.$province->name;
		$link = route('product_type_province',['product_type_key'=> $product_type->key, 'province_key'=> $province->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('products').'">Căn hộ</a></li> 
		<li class="active"><a href="'.route('product_type',['product_type_key'=> $product_type->key]).'">'.$product_type->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$province->name.'</a></li> 
		</ul>';
		
		$heading = $product_type->name.' '. $province->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.product_search', ['products'=> $products, 'product_type'=>$product_type,'province'=> $province, 'districts'=> $districts, 'price_ranges' => $price_ranges, 'area_ranges'=> $area_ranges, 'incense_types' => $incense_types
			, 'search_type'=> 'product_type_province', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PRODUCT_TYPE vs PROVINCE vs DISTRICT
	 */
	public function product_type_province_district($product_type_key, $province_key, $district_key, Request $request)
	{	
		$district = District::findByKey($district_key)->first();
		if(is_null($district) )
			$district = District::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		$province = $district->province;
		$wards = $district->wards()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$price_ranges = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$area_ranges = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$incense_types = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			
		$limit = Config::findByKey('rows_per_page_product')->first()->value;
		$product_type = Product_type::findByKey($product_type_key)->first();
		if(is_null($product_type) )
			$product_type = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		
	
		$products = Product::where('product_type_id',$product_type->id)->where('district_id',$district->id)->where('active',1);
		$project_id = $request->input('project');			
		$price_range_id = $request->input('price');			
		$area_range_id = $request->input('area');			
		$incense_type_id = $request->input('incense');	

		if(isset($project_id) && $project_id != '')
			$products->where('project_id', $project_id);
		
		if(isset($price_range_id) && $price_range_id != '')
			$products->where('price_range_id', $price_range_id);
	
		if(isset($area_range_id) && $area_range_id != '')
			$products->where('area_range_id', $area_range_id);
	
		if(isset($incense_type_id) && $incense_type_id != '')
			$products->where('incense_type_id', $incense_type_id);

		$products =$products->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $product_type->name.' '. $province->name.' '. $district->name;
		$link = route('product_type_province_district',['product_type_key'=> $product_type->key, 'province_key'=> $province->key, 'district_key' =>$district->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('products').'">Căn hộ</a></li> 
		<li class="active"><a href="'.route('product_type',['product_type_key'=> $product_type->key]).'">'.$product_type->name.'</a></li> 
		<li class="active"><a href="'.route('product_type_province',['product_type_key'=> $product_type->key, 'province_key'=>$province->key]).'">'.$province->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$district->name.'</a></li> 
		</ul>';
		
		$heading = $product_type->name.' '. $province->name.' '. $district->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.product_search', ['products'=> $products, 'product_type'=>$product_type, 'province'=>$province, 'district'=> $district, 'wards'=>$wards, 'price_ranges' => $price_ranges, 'area_ranges'=> $area_ranges, 'incense_types' => $incense_types
			, 'search_type'=> 'product_type_province_district', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PRODUCT_TYPE vs PROVINCE vs DISTRICT vs WARD
	 */
	public function product_type_province_district_ward($product_type_key, $province_key, $district_key, $ward_key, Request $request)
	{
		$ward = Ward::findByKey($ward_key)->first();
		if(is_null($ward) )
			$ward = Ward::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		$district = $ward->district;
		$province = $district->province;
		$price_ranges = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$area_ranges = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$incense_types = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			
		$limit = Config::findByKey('rows_per_page_product')->first()->value;
		$product_type = Product_type::findByKey($product_type_key)->first();
		if(is_null($product_type) )
			$product_type = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
				

		$products = Product::where('product_type_id',$product_type->id)->where('district_id',$district->id)->where('active',1);
		$project_id = $request->input('project');			
		$price_range_id = $request->input('price');			
		$area_range_id = $request->input('area');			
		$incense_type_id = $request->input('incense');	

		if(isset($project_id) && $project_id != '')
			$products->where('project_id', $project_id);
		
		if(isset($price_range_id) && $price_range_id != '')
			$products->where('price_range_id', $price_range_id);
	
		if(isset($area_range_id) && $area_range_id != '')
			$products->where('area_range_id', $area_range_id);
	
		if(isset($incense_type_id) && $incense_type_id != '')
			$products->where('incense_type_id', $incense_type_id);

		$products =$products->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $product_type->name.' '. $province->name.' '. $district->name.' '. $ward->name;
		$link = route('product_type_province_district_ward',['product_type_key'=> $product_type->key, 'province_key'=> $province->key, 'district_key' =>$district->key, 'ward_key'=>$ward->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('products').'">Căn hộ</a></li> 
		<li class="active"><a href="'.route('product_type',['product_type_key'=> $product_type->key]).'">'.$product_type->name.'</a></li> 
		<li class="active"><a href="'.route('product_type_province',['product_type_key'=> $product_type->key, 'province_key'=>$province->key]).'">'.$province->name.'</a></li> 
		<li class="active"><a href="'.route('product_type_province_district',['product_type_key'=> $product_type->key, 'province_key'=>$province->key, 'district_key'=> $district->key]).'">'.$district->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$ward->name.'</a></li> 
		</ul>';
		
		$heading = $product_type->name.' '. $province->name.' '. $district->name.' '. $ward->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.product_search', ['products'=> $products, 'product_type'=>$product_type, 'district'=> $district, 'price_ranges' => $price_ranges, 'area_ranges'=> $area_ranges, 'incense_types' => $incense_types
			, 'search_type'=> 'product_type_province_district', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}

	// FOR PRODUCT
	public function product_detail($product_id, $product_key)
	{
		$product = Product::findOrFail($product_id);

		if($product != null){
			$price_ranges = Price_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			$area_ranges = Area_range::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			$incense_types = Incense_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
						
			// metadata
			$site_title = $product->title . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($product->meta_description);
			SEOMeta::addKeyword([$product->meta_keywords]);
			SEOMeta::addMeta('product:published_time', $product->created_at->toW3CString(), 'property');
			if (isset($product->product_type->name)) {
				SEOMeta::addMeta('product:section', $product->product_type->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($product->meta_description);
			OpenGraph::setUrl($product->getLink());
			OpenGraph::addProperty('type', 'product');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($product->getThumnail());
			OpenGraph::addImage($product->attachments->lists('path'));
			OpenGraph::addImage(['url' => Image::url($product->getThumnail(),300,300,array('crop')), 'size' => 300]);
			// end metadata

			$attachments = $product->attachments()->take(5)->get();
			
			$wards = $product->district->wards;

			$heading = $product->product_type->name.' '. (isset($product->ward_id) && $product->ward_id > 0 ? $product->ward->name :$product->district->name );
			// $link ='';
			if(isset($product->ward_id) && $product->ward_id > 0)
			{
				$link = route('product_type_province_district_ward',['product_type_key'=> $product->product_type->key, 'province_key'=> $product->province->key, 'district_key' =>$product->district->key, 'ward_key'=>$product->ward->key]);
				$relate_products = $product->ward->products()->where('id', '<>', $product_id)->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get();
				if(count($relate_products) ==0)
					$relate_products = $product->district->products()->where('id', '<>', $product_id)->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get();
			}
			else
			{
				$link = route('product_type_province_district',['product_type_key'=> $product->product_type->key, 'province_key'=> $product->province->key, 'district_key' =>$product->district->key]);
				$relate_products = $product->district->products()->where('id', '<>', $product_id)->where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get();
			}
			if(count($relate_products) ==0){
				$relate_products = Product::where('active',1)->where('id', '<>', $product_id)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get();
				$heading = 'Tin tương tự';
			}

			$breadcrumb = '<ul class="breadcrumb pull-left padl0"> 
			<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
			<li class="active"><a href="'.route('products').'">Căn hộ</a></li> 
			<li class="active"><a href="'.route('product_type',['product_type_key'=> $product->product_type->key]).'">'.$product->product_type->name.'</a></li> 
			<li class="active"><a href="'.route('product_type_province',['product_type_key'=> $product->product_type->key, 'province_key'=>$product->province->key]).'">'.$product->province->name.'</a></li> 
			<li class="active"><a href="'.route('product_type_province_district',['product_type_key'=> $product->product_type->key, 'province_key'=>$product->province->key, 'district_key'=> $product->district->key]).'">'.$product->district->name.'</a></li> 
			'.(isset($product->ward_id) && $product->ward_id > 0 ? '<li class=""><a href="'.$link.'">'.$product->ward->name.'</a></li> ' :'').'
			</ul>';

			return view('frontend.sites1.product_detail',['product'=> $product, 'attachments'=>$attachments
				, 'product_type'=>$product->product_type, 'wards'=> $wards, 'price_ranges' => $price_ranges, 'area_ranges'=> $area_ranges, 'incense_types' => $incense_types
				, 'relate_products'=> $relate_products, 'search_type'=> 'product_detail', 'link'=> $link, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
		}
		else
			return view('frontend.sites1.product_detail');
	}

	public function product_search(Request $request)
	{		
		$this->setMetadata('Tìm kiếm tin đăng');
		$product_type_id = $request->input('product_type');			
		$province_id = $request->input('province');			
		$district_id = $request->input('district');			
		$ward_id = $request->input('ward');			
		$street_id = $request->input('street');				
		$price_range_id = $request->input('price');			
		$area_range_id = $request->input('area');			
		$incense_type_id = $request->input('incense');	
		$limit = Config::findByKey('rows_per_page_product')->first()->value;		

		$searchDescription = "";
		$product_type = null;
		$province = null;
		$district = null;
		$ward = null;
		$street = null;
		$query = Product::query();
		try{
			if(isset($product_type_id) && $product_type_id != "")
			{
				$query->where('product_type_id',$product_type_id);
				$product_type = product_type::findOrFail($product_type_id);
				$searchDescription .= $product_type->name;
			}
			if(isset($province_id) && $province_id != "")
			{
				$query->where('province_id',$province_id);
				$province = Province::findOrFail($province_id);
				$searchDescription .= ", ". $province->name;
			}
			if(isset($district_id) && $district_id != "")
			{
				$query->where('district_id',$district_id);			
				$district = District::findOrFail($district_id);
				$searchDescription .= ", ". $district->name;
			}
			if(isset($ward_id) && $ward_id != "")
			{
				$query->where('ward_id',$ward_id);
				$ward = Ward::findOrFail($ward_id);
				$searchDescription .= ", ". $ward->name;
			}
			if(isset($street_id) && $street_id != "")
			{
				$query->where('street_id',$street_id);
				$street = Street::findOrFail($street_id);
				$searchDescription .= ", ". $street->name;
			}
		} catch(Exception $e){
		};
		$products = $query->paginate($limit);
		$product_types = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$hcmProvince = Province::findByKey('ho-chi-minh')->first();
		// dd($hcmProvince->id);
		$districtProduct = District::where('province_id','=', $hcmProvince->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		return view('frontend.sites1.product_search', ['products'=> $products, 'product_types'=> $product_types, 'districtProduct' => $districtProduct, 'searchDescription'=> $searchDescription]);
	
	}

	/**
	 * setMetadata for common pages
	 */
	private function setMetadata($prefix = '')
	{
		// metadata
		$site_title = Config::findByKey('site_title')->first()->value;
		if ($prefix != '') {
			$site_title = $prefix . ' - ' . $site_title;
		}
		$meta_description = Config::findByKey('meta_description')->first()->value;
		$meta_keywords = Config::findByKey('meta_keywords')->first()->value;
		SEOMeta::setTitle($site_title);
		SEOMeta::setDescription($meta_description);
		SEOMeta::addKeyword([$meta_keywords]);

		OpenGraph::setTitle($site_title);
		OpenGraph::setDescription($meta_description);
		OpenGraph::setUrl(route('homepage'));
		OpenGraph::addProperty('type', 'articles');
		// end metadata
	}


	
	/******************************************************************************************************************
	 * F O R  	P R O J E C T
	 ******************************************************************************************************************/
	/**
	 * PROJECT
	 */
	public function projects( Request $request)
	{		
		$this->setMetadata('Tin rao căn hộ');
		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$searchDescription = 'Dự án';
		$link = route('projects');
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class=""><a href="'.$link.'">căn hộ</a></li> 
		</ul>';
		$projects = Project::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);

		$project_types = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$provinces = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$heading = 'Dự án';
		return view('frontend.sites1.project_search', ['projects'=> $projects,'provinces'=> $provinces, 'project_types'=>$project_types //
			, 'search_type'=> 'projects', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PROJECT_TYPE
	 */
	public function project_type($project_type_key, Request $request)
	{	
		$provinces = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		
			
		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$project_type = Project_type::findByKey($project_type_key)->first();
		if(is_null($project_type) )
			$project_type = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		
		$projects = $project_type->projects()->where('active',1);

		$projects =$projects->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $project_type->name;
		$link = route('project_type',['project_type_key'=> $project_type->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('projects').'">Dự án</a></li> 
		<li class=""><a href="'.$link.'">'.$project_type->name.'</a></li> 
		</ul>';
		$heading = $project_type->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.project_search', ['projects'=> $projects, 'project_type'=>$project_type,'provinces'=> $provinces
			, 'search_type'=> 'project_type', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PROJECT_TYPE vs PROVINCE
	 */
	public function project_type_province($project_type_key, $province_key, Request $request)
	{	
		$province = Province::findByKey($province_key)->first();
		$districts = District::where('province_id', $province->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		
			
		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$project_type = Project_type::findByKey($project_type_key)->first();
		if(is_null($project_type) )
			$project_type = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		
		if(is_null($province) )
			$province = Province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();

		$projects = Project::where('project_type_id',$project_type->id)->where('province_id',$province->id)->where('active',1);
		
		$projects =$projects->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $project_type->name.' '.$province->name;
		$link = route('project_type_province',['project_type_key'=> $project_type->key, 'province_key'=> $province->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('projects').'">Dự án</a></li> 
		<li class="active"><a href="'.route('project_type',['project_type_key'=> $project_type->key]).'">'.$project_type->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$province->name.'</a></li> 
		</ul>';
		
		$heading = $project_type->name.' '. $province->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.project_search', ['projects'=> $projects, 'project_type'=>$project_type,'province'=> $province, 'districts'=> $districts
			, 'search_type'=> 'project_type_province', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PROJECT_TYPE vs PROVINCE vs DISTRICT
	 */
	public function project_type_province_district($project_type_key, $province_key, $district_key, Request $request)
	{	
		$district = District::findByKey($district_key)->first();
		if(is_null($district) )
			$district = District::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		$province = $district->province;
		$wards = $district->wards()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		
			
		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$project_type = Project_type::findByKey($project_type_key)->first();
		if(is_null($project_type) )
			$project_type = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		
	
		$projects = Project::where('project_type_id',$project_type->id)->where('district_id',$district->id)->where('active',1);
		
		$projects =$projects->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $project_type->name.' '. $province->name.' '. $district->name;
		$link = route('project_type_province_district',['project_type_key'=> $project_type->key, 'province_key'=> $province->key, 'district_key' =>$district->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('projects').'">Dự án</a></li> 
		<li class="active"><a href="'.route('project_type',['project_type_key'=> $project_type->key]).'">'.$project_type->name.'</a></li> 
		<li class="active"><a href="'.route('project_type_province',['project_type_key'=> $project_type->key, 'province_key'=>$province->key]).'">'.$province->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$district->name.'</a></li> 
		</ul>';
		
		$heading = $project_type->name.' '. $province->name.' '. $district->name;
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.project_search', ['projects'=> $projects, 'project_type'=>$project_type, 'province'=>$province, 'district'=> $district, 'wards'=>$wards
			, 'search_type'=> 'project_type_province_district', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * PROJECT_TYPE vs PROVINCE vs DISTRICT vs WARD
	 */
	public function project_type_province_district_ward($project_type_key, $province_key, $district_key, $ward_key, Request $request)
	{
		$ward = Ward::findByKey($ward_key)->first();
		if(is_null($ward) )
			$ward = Ward::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();
		$district = $ward->district;
		$province = $district->province;
		
			
		$limit = Config::findByKey('rows_per_page_project')->first()->value;
		$project_type = Project_type::findByKey($project_type_key)->first();
		if(is_null($project_type) )
			$project_type = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
				

		$projects = Project::where('project_type_id',$project_type->id)->where('district_id',$district->id)->where('active',1);
		
		$projects =$projects->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $project_type->name.' '. $province->name.' '. $district->name.' '. $ward->name;
		$link = route('project_type_province_district_ward',['project_type_key'=> $project_type->key, 'province_key'=> $province->key, 'district_key' =>$district->key, 'ward_key'=>$ward->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('projects').'">Dự án</a></li> 
		<li class="active"><a href="'.route('project_type',['project_type_key'=> $project_type->key]).'">'.$project_type->name.'</a></li> 
		<li class="active"><a href="'.route('project_type_province',['project_type_key'=> $project_type->key, 'province_key'=>$province->key]).'">'.$province->name.'</a></li> 
		<li class="active"><a href="'.route('project_type_province_district',['project_type_key'=> $project_type->key, 'province_key'=>$province->key, 'district_key'=> $district->key]).'">'.$district->name.'</a></li> 
		<li class=""><a href="'.$link.'">'.$ward->name.'</a></li> 
		</ul>';
		
		$heading = $project_type->name.' '. $province->name.' '. $district->name.' '. $ward->name;
		$projectCategory = new ProjectCategory;
		$projectsSpecial = $projectCategory->getProjectsByCategoryKey('du-an-noi-bat', 5);
		$this->setMetadata($searchDescription);
		return view('frontend.sites1.project_search', ['projects'=> $projects, 'project_type'=>$project_type, 'district'=> $district, 'projectsSpecial'=>$projectsSpecial
			, 'search_type'=> 'project_type_province_district', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}

	public function project_detail($project_id,$project_key)
	{
		$project = Project::where('key',$project_key)->first();
		if($project != null){
			$project_parts = $project->project_parts()->where('active',1)->where('type','E')->orderBy('priority')->get();
			$project_articles = $project->project_parts()->where('active',1)->where('type','A')->orderBy('priority')->get();
			$project_images = $project->project_images()->where('active',1)->where('path', '<>',$project->logo)->orderBy('priority')->take(10)->get();
			$other_projects = Project::where('active',1)->orderBy('priority')->take(6)->get();
			$project_agents = $project->agents()->get();

			// metadata
			$site_title = $project->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($project->meta_description);
			SEOMeta::addKeyword([$project->meta_keywords]);
			SEOMeta::addMeta('project:published_time', $project->created_at->toW3CString(), 'property');
			if (isset($project->district->name)) {
				SEOMeta::addMeta('project:section', $project->district->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($project->meta_description);
			OpenGraph::setUrl( $project->getLink());
			OpenGraph::addProperty('type', 'project');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($project->logo);
			OpenGraph::addImage($project_images->lists('path'));
			OpenGraph::addImage(['url' => Image::url($project->logo,300,300,array('crop')), 'size' => 300]);
			// end metadata
			$hmcDistrict = Province::findByKey('ho-chi-minh')->first()->districts()->where('is_publish', 1)->orderBy('priority')->get();
			return view('frontend.sites.project',compact('project', 'project_parts','project_articles','project_images','other_projects','project_agents', 'hmcDistrict'));
		}
		else
			return view('errors.404');
	}
	public function project_part($project_id, $project_key, $project_part_id ,$project_part_key)
	{
		$project_part = Project_part::findOrFail($project_part_id);
		if($project_part != null){
			$project = $project_part->project;
			$project_parts = $project->project_parts()->where('active',1)->where('type','E')->orderBy('priority')->get();
			$project_articles = $project->project_parts()->where('active',1)->where('type','A')->orderBy('priority')->get();
			$project_images = $project->project_images()->where('active',1)->where('path', '<>',$project->logo)->orderBy('priority')->take(5)->get();
			$other_projects = Project::where('active',1)->orderBy('priority')->take(5)->get();
			$project_agents = $project->agents()->get();

			// metadata
			$site_title = $project->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($project->meta_description);
			SEOMeta::addKeyword([$project->meta_keywords]);
			SEOMeta::addMeta('project:published_time', $project->created_at->toW3CString(), 'property');
			if (isset($project->district->name)) {
				SEOMeta::addMeta('project:section', $project->district->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($project->meta_description);
			OpenGraph::setUrl( $project->getLink());
			OpenGraph::addProperty('type', 'project');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($project->logo);
			OpenGraph::addImage($project_images->lists('path'));
			OpenGraph::addImage(['url' => Image::url($project->logo,300,300,array('crop')), 'size' => 300]);
			// end metadata
			return view('frontend.sites.project_part',compact('project', 'project_parts', 'project_part','project_articles','project_images','other_projects','project_agents'));
		}
		else
			return view('errors.404');
	}


	public function contact()
	{
		$this->setMetadata('Liên hệ');

		return view('frontend.sites1.contact');
	}

	public function createContact(Request $request)
	{
		$json = json_decode('{"success":false, "message": "Đăng ký không thành công"}');
		//$arrayName = array('success' =>  false, 'message' => 'Đăng ký không thành công' );
		$validator = Validator::make($request->get('Contact'), Contact::$rules);
		if ($validator->fails())
		{
			if ($request->ajax()) {
				return response()->json($json);
			}
			else{
				return redirect()->back()->withErrors($validator->errors());
			}
		}
		else
		{
			$contact = new Contact;

			$contact->full_name = $request->input('Contact.full_name');
			$contact->email = $request->input('Contact.email');
			$contact->phone = $request->input('Contact.phone');
			$contact->subject = $request->input('Contact.subject');
			$contact->content = $request->input('Contact.content');
	 
			//Tiến hành lưu dữ liệu vào database
			$contact->save();

			// send email
			$common = new Common;
			$config = new Config;
			/*try{
				$common->sendEmail('frontend.emails.contact', $data = ['contact' => $contact], $to = $config->getValueByKey('address_received_mail'), $toName = $contact->full_name
				, $subject = $contact->subject, $cc = $contact->email, $replyTo = $contact->email);
			}catch(Exception $e){

			}*/
			if ($request->ajax()) {
				$json->success = true;
				$json->message = 'Chúng tôi sẽ chủ động cập nhật thông tin mới nhất đến bạn.';
				return response()->json($json);
			}
			else{
				return redirect(route('contact'))->with('contact-status', 'Nội dung liên hệ của quý khách đã được gửi đến ban quản trị. Chúng tôi sẽ phản hồi quý khách trong thời gian sớm nhất. Xin cảm ơn!');
			}
		}
	}



	// FOR PROJECT DETAIL QVRENTY TEMPLATE
	public function project_detail_qvrenty($project_key, $project_id)
	{
		$project = Project::findOrFail($project_id);//Project::findByKey($project_key)->first();
		if($project != null){
	//dd($product);
			
			$district = District::findOrFail($project->district_id);
			if(is_null($district) )
				$district = District::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();
			$province = $district->province;
			$wards = $district->wards()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
			
				
			$limit = Config::findByKey('rows_per_page_project')->first()->value;
			$project_type = $project->project_type;//Project_type::findByKey($project->project_type_id);
			if(is_null($project_type) )
				$project_type = Project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->first();
			
			$searchDescription = $project_type->name.' '. $province->name.' '. $district->name;
			$link = route('project_type_province_district',['project_type_key'=> $project_type->key, 'province_key'=> $province->key, 'district_key' =>$district->key]);
			$breadcrumb = '<ul class="breadcrumb pull-left padl0"> 
			<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
			<li class="active"><a href="'.route('projects').'">Dự án</a></li> 
			<li class="active"><a href="'.route('project_type',['project_type_key'=> $project_type->key]).'">'.$project_type->name.'</a></li> 
			<li class="active"><a href="'.route('project_type_province',['project_type_key'=> $project_type->key, 'province_key'=>$province->key]).'">'.$province->name.'</a></li> 
			<li class=""><a href="'.$link.'">'.$district->name.'</a></li> 
			</ul>';
			
			$heading = $project_type->name.' '. $province->name.' '. $district->name;
			

			$project_parts = $project->project_parts()->where('active',1)->where('type','E')->orderBy('priority')->get();
			$project_articles = $project->project_parts()->where('active',1)->where('type','A')->orderBy('priority')->get();
			$project_images = $project->project_images()->get();//->take(5)
			//dd($project_images[0]->path);
			/*$project_images = $project->project_images()->where('active',1)->where('path', '<>',$project->logo)->orderBy('priority')->take(5)->get();
			dd($project_images);*/
			$other_projects = Project::where('active',1)->orderBy('priority')->take(5)->get();
			$project_agents = $project->agents()->get();

			// metadata
			$site_title = $project->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($project->meta_description);
			SEOMeta::addKeyword([$project->meta_keywords]);
			SEOMeta::addMeta('project:published_time', $project->created_at->toW3CString(), 'property');
			if (isset($project->district->name)) {
				SEOMeta::addMeta('project:section', $project->district->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($project->meta_description);
			OpenGraph::setUrl( $project->getLink());
			OpenGraph::addProperty('type', 'project');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($project->logo);
			OpenGraph::addImage($project_images->lists('path'));
			OpenGraph::addImage(['url' => Image::url($project->logo,300,300,array('crop')), 'size' => 300]);
			// end metadata
			
			/*return view('frontend.sites1.project_detail',compact('project', 'project_parts','project_articles','project_images','other_projects','project_agents', 'hmcDistrict'));*/

			return view('frontend.sites1.project_detail', ['project'=> $project, 'other_projects'=> $other_projects, 'project_type'=>$project_type, 'province'=>$province, 'district'=> $district, 'wards'=>$wards
				, 'search_type'=> 'project_type_province_district', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading
				, 'project_parts' =>$project_parts, 'project_articles' =>$project_articles
				, 'project_images' =>$project_images, 'project_agents' =>$project_agents]);
		}
		else
			return redirect()->route('homepage');;
	}


	
	/******************************************************************************************************************
	 * F O R 	 A R T I C L E
	 ******************************************************************************************************************/
	public function articles( Request $request)
	{		
		$this->setMetadata('Tin tức căn hộ, nhà đất');
		$limit = Config::findByKey('rows_per_page_article')->first()->value;
		$searchDescription = 'Tin tức';
		$link = route('articles');
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class=""><a href="'.$link.'">Tin tức</a></li> 
		</ul>';
		$articles = Article::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);

		$article_categorys = ArticleCategory::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$heading = 'Tin tức';
		return view('frontend.sites1.article_search', ['articles'=> $articles, 'article_categorys'=>$article_categorys 
			, 'search_type'=> 'articles', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * ARTICLE_CATEGORY
	 */
	public function article_category($article_category_key, Request $request)
	{	
		$limit = Config::findByKey('rows_per_page_article')->first()->value;
		$article_category = ArticleCategory::findByKey($article_category_key)->first();
		if(is_null($article_category) )
			$article_category = ArticleCategory::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->first();

		$articles = $article_category->articles()->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->paginate($limit);
		$searchDescription = $article_category->name;
		$link = route('article_category',['article_category_key'=> $article_category->key]);
		$breadcrumb = '<ul class="breadcrumb"> 
		<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
		<li class="active"><a href="'.route('articles').'">Tin tức</a></li> 
		<li class=""><a href="'.$link.'">'.$article_category->name.'</a></li> 
		</ul>';
		$heading = $article_category->name;
		$this->setMetadata($searchDescription);
		$article_categorys =  ArticleCategory::where('id','<>',$article_category->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		return view('frontend.sites1.article_search', ['articles'=> $articles, 'article_category'=>$article_category, 'article_categorys'=>$article_categorys
			, 'search_type'=> 'article_category', 'link'=> $link, 'searchDescription'=> $searchDescription, 'breadcrumb' => $breadcrumb, 'heading' => $heading]);
	}
	/**
	 * ARTICLE_DETAIL
	 */
	public function article_detail($article_id, $article_key)
	{
		$article = Article::findOrFail($article_id);

		if($article != null){
						
			// metadata
			$site_title = $article->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($article->meta_description);
			SEOMeta::addKeyword([$article->meta_keywords]);
			SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
			if (isset($article->article_category->name)) {
				SEOMeta::addMeta('article:section', $article->article_category->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($article->meta_description);
			OpenGraph::setUrl($article->getLink());
			OpenGraph::addProperty('type', 'article');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($article->getThumnail());
			OpenGraph::addImage($article->attachments->lists('path'));
			OpenGraph::addImage(['url' => Image::url($article->getThumnail(),300,300,array('crop')), 'size' => 300]);
			// end metadata

			$attachments = $article->attachments()->take(5)->get();
			$article_category = $article->categories()->first();
			$article_categorys = isset($article_category) ? ArticleCategory::where('id','<>',$article_category->id)->where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get()
			 : ArticleCategory::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get();

			$link = $article->getLink();
			$categoryLink = isset($article_category) ? '<li class="active"><a href="'.$article_category->getLink().'">'.$article_category->name.'</a></li> ' : '';

			$breadcrumb = '<ul class="breadcrumb pull-left padl0"> 
			<li class="active"><a href="'.route('homepage').'">Trang chủ</a></li> 
			<li class="active"><a href="'.route('articles').'">Tin tức</a></li> 
			'.$categoryLink.'
			<li class=""><a href="'.$link.'">'.$article->name.'</a></li>
			</ul>';
			
			return view('frontend.sites1.article_detail',['article'=> $article, 'attachments'=>$attachments
				, 'article_category'=>$article_category, 'article_categorys'=>$article_categorys
				, 'search_type'=> 'article_detail', 'link'=> $link, 'breadcrumb' => $breadcrumb]);
		}
		else
			return view('frontend.sites1.article_detail');
	}
}
