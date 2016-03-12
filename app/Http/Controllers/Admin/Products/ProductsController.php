<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Language;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$products = Product::orderBy('priority')->get();
		if ($request->ajax()) {
			return $products->toArray();
		}
		return view('admin.products.index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// validate request
		$validateProduct = Validator::make($request->get('Product'), Product::$rules);
		$validationMessages = [];

		if ($validateProduct->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProduct->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request) {
			$user = $request->user();

			// insert Product
			$product = new Product;
			$product->key = Common::createKeyURL($request->input('Product.title'));

			$product->title = $request->input('Product.title');
			$product->product_type_id = $request->input('Product.product_type_id');
			$product->province_id = $request->input('Product.province_id');
			$product->district_id = $request->input('Product.district_id');
			$product->ward_id = $request->input('Product.ward_id');
			$product->street_id = $request->input('Product.street_id');
			$product->project_id = $request->input('Product.project_id');
			$product->area = $request->input('Product.area');
			$product->price = $request->input('Product.price');
			$product->price_type = $request->input('Product.price_type');
			$product->total_price = $request->input('Product.total_price');
			$product->address = $request->input('Product.address');
			$product->summary = $request->input('Product.summary');
			
			$product->description = $request->input('Product.description');
			$product->home_direction = $request->input('Product.home_direction');
			$product->room_number = $request->input('Product.room_number');
			$product->toilet_number = $request->input('Product.toilet_number');
			$product->interior = $request->input('Product.interior');
			$product->main_image = $request->input('Product.main_image');

			$product->br_name = $request->input('Product.br_name');
			$product->br_address = $request->input('Product.br_address');
			$product->br_phone = $request->input('Product.br_phone');
			$product->br_email = $request->input('Product.br_email');

			$product->map_latitude = $request->input('Product.map_latitude');
			$product->map_longitude = $request->input('Product.map_longitude');
			$product->meta_description = $request->input('Product.meta_description');
			$product->meta_keywords = $request->input('Product.meta_keywords');

			$product->priority = $request->input('Product.priority');
			$product->active = $request->input('Product.active');
			$product->created_by = $user->name;
			$product->updated_by = $user->name;
			$product->save();

			// save attachments
			if ($request->input('Product.attachments') != "") {
				$requestAttachments = explode(',', $request->input('Product.attachments'));
				$attachments = [];
				foreach ($requestAttachments as $key => $value) {
					if($key == 0 && !isset($product->main_image))
						$product->main_image = $value;
					array_push($attachments, new Attachment([
						'entry_id' => $product->id,
						'table_name' => 'products',
						'path' => $value,
						'priority' => 0,
						'is_publish' => 1
						]));
				}
				if (count($attachments) > 0) {
					$product->attachments()->saveMany($attachments);
				}
			}

			$product->save();

		});

		return redirect()->route('admin.products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Product::with( 'attachments')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('admin.products.edit', ['product' => $product]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// validate request
		$validateProduct = Validator::make($request->get('Product'), Product::$rules);
		$validationMessages = [];

		if ($validateProduct->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProduct->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request, $id) {
			$user = $request->user();

			// insert Product
			$product = Product::findOrFail($id);
			$product->key = Common::createKeyURL($request->input('Product.title'));
			
			$product->title = $request->input('Product.title');
			$product->product_type_id = $request->input('Product.product_type_id');
			$product->province_id = $request->input('Product.province_id');
			$product->district_id = $request->input('Product.district_id');
			$product->ward_id = $request->input('Product.ward_id');
			$product->street_id = $request->input('Product.street_id');
			$product->project_id = $request->input('Product.project_id');
			$product->area = $request->input('Product.area');
			$product->price = $request->input('Product.price');
			$product->price_type = $request->input('Product.price_type');
			$product->total_price = $request->input('Product.total_price');
			$product->address = $request->input('Product.address');
			$product->summary = $request->input('Product.summary');

			$product->description = $request->input('Product.description');
			$product->home_direction = $request->input('Product.home_direction');
			$product->room_number = $request->input('Product.room_number');
			$product->toilet_number = $request->input('Product.toilet_number');
			$product->interior = $request->input('Product.interior');
			$product->main_image = $request->input('Product.main_image');

			$product->br_name = $request->input('Product.br_name');
			$product->br_address = $request->input('Product.br_address');
			$product->br_phone = $request->input('Product.br_phone');
			$product->br_email = $request->input('Product.br_email');
			
			$product->map_latitude = $request->input('Product.map_latitude');
			$product->map_longitude = $request->input('Product.map_longitude');
			$product->meta_description = $request->input('Product.meta_description');
			$product->meta_keywords = $request->input('Product.meta_keywords');

			$product->priority = $request->input('Product.priority');
			$product->active = $request->input('Product.active');
			$product->created_by = $user->name;
			$product->updated_by = $user->name;
			$product->save();

			// save attachments
			// only insert or delete, not update
			if ($request->input('Product.attachments') != "") {
				$currentAttachments = $product->attachments->lists('id');
				$requestAttachments = explode(',', $request->input('Product.attachments'));
				$attachments = [];
				$keepAttachments = [];
				foreach ($requestAttachments as $key => $value) {
					if (strpos($value, '|') === false) {
						array_push($attachments, new Attachment([
							'entry_id' => $product->id,
							'table_name' => 'products',
							'path' => $value,
							'priority' => 0,
							'is_publish' => 1
						]));
					}
					else {
						$attachmentId = explode('|', $value)[0];
						array_push($keepAttachments, $attachmentId);
					}
				}
				if (count($attachments) > 0) {
					$product->attachments()->saveMany($attachments);
				}
				// delete attachments
				foreach ($currentAttachments as $key => $value) {
					if (!in_array($value, $keepAttachments)) {
						Attachment::findOrFail($value)->delete();
					}
				}
			}

			$product->save();

		});

		return redirect()->route('admin.products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		DB::transaction(function () use ($id) {
			$user = Auth::user();
			$product = Product::findOrFail($id);
			$product->updated_by = $user->name;
			$product->deleted_by = $user->name;
			$product->key = $product->key.'-'.microtime(true);
			$product->save();

			// soft delete
			$product->delete();
		});
	}
}
