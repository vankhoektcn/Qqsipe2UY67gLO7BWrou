<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Product_type;
use DB;
use App\Common;
use Auth;

class Product_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product_types = Product_type::all();
        if ($request->ajax()) {
            return $product_types->toArray();
        }
        return view('admin.product_types.index', ['product_types' => $product_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_types.create');
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
        $validateProduct_type = Validator::make($request->get('Product_type'), Product_type::$rules);
        $validationMessages = [];

        if ($validateProduct_type->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProduct_type->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request) {
            $user = $request->user();

            // insert Product_type
            $product_type = new Product_type;
            $product_type->key = Common::createKeyURL($request->input('Product_type.name'));
            $product_type->priority = $request->input('Product_type.priority');
            $product_type->is_publish = $request->input('Product_type.is_publish');
            $product_type->created_by = $user->name;
            $product_type->updated_by = $user->name;
            $product_type->save();


        });

        return redirect()->route('admin.product_types.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product_type::with('translations')->findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = Product_type::findOrFail($id);
        return view('admin.product_types.edit', ['product_type' => $product_type]);
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
        $validateProduct_type = Validator::make($request->get('Product_type'), Product_type::$rules);
        $validationMessages = [];


        if ($validateProduct_type->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProduct_type->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $id) {
            $user = $request->user();

            // insert Product_type
            $product_type = Product_type::findOrFail($id);
            $product_type->key = Common::createKeyURL($request->input('Product_type.name'));
            $product_type->priority = $request->input('Product_type.priority');
            $product_type->is_publish = $request->input('Product_type.is_publish');
            $product_type->created_by = $user->name;
            $product_type->updated_by = $user->name;
            $product_type->save();

        });

        return redirect()->route('admin.product_types.index');

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
            $product_type = Product_type::findOrFail($id);
            $product_type->updated_by = $user->name;
            $product_type->deleted_by = $user->name;
            $product_type->key = $product_type->key.'-'.microtime(true);
            $product_type->save();

            // soft delete
            $product_type->delete();
        });
    }
}
