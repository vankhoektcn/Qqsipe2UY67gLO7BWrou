<?php

namespace App\Http\Controllers\Admin\Others;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Province;
use App\ProvinceTranslation;
use App\Language;
use DB;
use App\Common;
use Auth;

class provincesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = Province::all();
        if ($request->ajax()) {
            return $provinces->toArray();
        }
        return view('admin.provinces.index', ['provinces' => $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinces.create');
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
        $validateProvince = Validator::make($request->get('Province'), Province::$rules);
        $validationMessages = [];

        foreach ($request->get('ProvinceTranslation') as $key => $value) {
            $validateProvinceTranslation = Validator::make($value, ProvinceTranslation::$rules);
            if ($validateProvinceTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateProvinceTranslation->messages()->toArray());
            }
        }

        if ($validateProvince->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProvince->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // get all languages
        $languages = Language::all();
        // find language default
        $languageDefault = $languages->where('is_key_language', 1)->first();
        if (is_null($languageDefault)) {
            $languageDefault = $languages->first();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $languageDefault) {
            $user = $request->user();

            // insert Province
            $province = new Province;
            $province->key = Common::createKeyURL($request->input('ProvinceTranslation.'.$languageDefault->code.'.name'));
            $province->priority = $request->input('Province.priority');
            $province->is_publish = $request->input('Province.is_publish');
            $province->created_by = $user->name;
            $province->updated_by = $user->name;
            $province->save();


            // save data languages
            foreach ($request->get('ProvinceTranslation') as $locale => $value) {
                $province->translateOrNew($locale)->name = $request->input('ProvinceTranslation.' .$locale. '.name');
            }

            $province->save();

        });

        return redirect()->route('admin.provinces.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Province::with('translations')->findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view('admin.provinces.edit', ['province' => $province]);
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
        $validateProvince = Validator::make($request->get('Province'), Province::$rules);
        $validationMessages = [];

        foreach ($request->get('ProvinceTranslation') as $key => $value) {
            $validateProvinceTranslation = Validator::make($value, ProvinceTranslation::$rules);
            if ($validateProvinceTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateProvinceTranslation->messages()->toArray());
            }
        }

        if ($validateProvince->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProvince->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // get all languages
        $languages = Language::all();
        // find language default
        $languageDefault = $languages->where('is_key_language', 1)->first();
        if (is_null($languageDefault)) {
            $languageDefault = $languages->first();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $id, $languageDefault) {
            $user = $request->user();

            // insert Province
            $province = Province::findOrFail($id);
            $province->key = Common::createKeyURL($request->input('ProvinceTranslation.'.$languageDefault->code.'.name'));
            $province->priority = $request->input('Province.priority');
            $province->is_publish = $request->input('Province.is_publish');
            $province->created_by = $user->name;
            $province->updated_by = $user->name;
            $province->save();


            // save data languages
            foreach ($request->get('ProvinceTranslation') as $locale => $value) {
                $province->translateOrNew($locale)->name = $request->input('ProvinceTranslation.' .$locale. '.name');
            }

            $province->save();

        });

        return redirect()->route('admin.provinces.index');

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
            $province = Province::findOrFail($id);
            $province->updated_by = $user->name;
            $province->deleted_by = $user->name;
            $province->key = $province->key.'-'.microtime(true);
            $province->save();

            // soft delete
            $province->delete();
        });
    }
}
