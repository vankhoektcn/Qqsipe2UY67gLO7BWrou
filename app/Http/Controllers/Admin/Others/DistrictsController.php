<?php

namespace App\Http\Controllers\Admin\Others;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\District;
use App\DistrictTranslation;
use App\Province;
use App\Language;
use DB;
use App\Common;
use Auth;

class districtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $districts = District::orderBy('priority')->get();
        if ($request->ajax()) {
            return $districts->toArray();
        }
        return view('admin.districts.index', ['districts' => $districts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.districts.create');
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
        $validateDistrict = Validator::make($request->get('District'), District::$rules);
        $validationMessages = [];

        foreach ($request->get('DistrictTranslation') as $key => $value) {
            $validateDistrictTranslation = Validator::make($value, DistrictTranslation::$rules);
            if ($validateDistrictTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateDistrictTranslation->messages()->toArray());
            }
        }

        if ($validateDistrict->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateDistrict->messages()->toArray(), $validationMessages);
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

            // insert District
            $district = new District;
            $district->key = Common::createKeyURL($request->input('DistrictTranslation.'.$languageDefault->code.'.name'));
            $district->province_id = $request->input('District.province_id');
            $district->priority = $request->input('District.priority');
            $district->is_publish = $request->input('District.is_publish');
            $district->created_by = $user->name;
            $district->updated_by = $user->name;
            $district->save();

            // save data languages
            foreach ($request->get('DistrictTranslation') as $locale => $value) {
                $district->translateOrNew($locale)->name = $request->input('DistrictTranslation.' .$locale. '.name');
            }


            $district->save();

        });

        return redirect()->route('admin.districts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $district = District::with('translations')->findOrFail($id)->toArray();
        $provinces = province::where('is_publish',1)->orderBy('priority')->get()->toArray();
        return ['district' => $district, 'provinces' => $provinces];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('admin.districts.edit', ['district' => $district]);
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
        $validateDistrict = Validator::make($request->get('District'), District::$rules);
        $validationMessages = [];

        foreach ($request->get('DistrictTranslation') as $key => $value) {
            $validateDistrictTranslation = Validator::make($value, DistrictTranslation::$rules);
            if ($validateDistrictTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateDistrictTranslation->messages()->toArray());
            }
        }

        if ($validateDistrict->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateDistrict->messages()->toArray(), $validationMessages);
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

            // insert District
            $district = District::findOrFail($id);
            $district->key = Common::createKeyURL($request->input('DistrictTranslation.'.$languageDefault->code.'.name'));
            $district->province_id = $request->input('District.province_id');
            $district->priority = $request->input('District.priority');
            $district->is_publish = $request->input('District.is_publish');
            $district->created_by = $user->name;
            $district->updated_by = $user->name;
            $district->save();

            // save data languages
            foreach ($request->get('DistrictTranslation') as $locale => $value) {
                $district->translateOrNew($locale)->name = $request->input('DistrictTranslation.' .$locale. '.name');
            }

            $district->save();

        });

        return redirect()->route('admin.districts.index');

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
            $district = District::findOrFail($id);
            $district->updated_by = $user->name;
            $district->deleted_by = $user->name;
            $district->key = $district->key.'-'.microtime(true);
            $district->save();

            // soft delete
            $district->delete();
        });
    }
}
