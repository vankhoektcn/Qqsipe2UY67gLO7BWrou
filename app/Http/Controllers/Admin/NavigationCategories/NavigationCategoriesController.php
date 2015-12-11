<?php

namespace App\Http\Controllers\Admin\NavigationCategories;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\NavigationCategory;
use App\NavigationCategoryTranslation;
use App\Language;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class NavigationCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $navigationCategories = NavigationCategory::orderBy('priority')->get();
        if ($request->ajax()) {
            return $navigationCategories->toArray();
        }
        return view('admin.navigationcategories.index', ['navigationCategories' => $navigationCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navigationcategories.create');
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
        $validateNavigationCategory = Validator::make($request->get('NavigationCategory'), NavigationCategory::$rules);
        $validationMessages = [];

        foreach ($request->get('NavigationCategoryTranslation') as $key => $value) {
            $validateNavigationCategoryTranslation = Validator::make($value, NavigationCategoryTranslation::$rules);
            if ($validateNavigationCategoryTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateNavigationCategoryTranslation->messages()->toArray());
            }
        }

        if ($validateNavigationCategory->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateNavigationCategory->messages()->toArray(), $validationMessages);
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

            // insert NavigationCategory
            $navigationCategory = new NavigationCategory;
            $navigationCategory->key = Common::createKeyURL($request->input('NavigationCategoryTranslation.'.$languageDefault->code.'.name'));
            $navigationCategory->parent_id = $request->input('NavigationCategory.parent_id');
            $navigationCategory->priority = $request->input('NavigationCategory.priority');
            $navigationCategory->is_publish = $request->input('NavigationCategory.is_publish');
            $navigationCategory->created_by = $user->name;
            $navigationCategory->updated_by = $user->name;
            $navigationCategory->save();

            // save data languages
            foreach ($request->get('NavigationCategoryTranslation') as $locale => $value) {
                $navigationCategory->translateOrNew($locale)->name = $request->input('NavigationCategoryTranslation.' .$locale. '.name');
                $navigationCategory->translateOrNew($locale)->summary = $request->input('NavigationCategoryTranslation.' .$locale. '.summary');
            }

            $navigationCategory->save();

        });

        return redirect()->route('admin.navigationcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return NavigationCategory::with('translations')->findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $navigationCategory = NavigationCategory::findOrFail($id);
        return view('admin.navigationcategories.edit', ['navigationCategory' => $navigationCategory]);
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
        $validateNavigationCategory = Validator::make($request->get('NavigationCategory'), NavigationCategory::$rules);
        $validationMessages = [];

        foreach ($request->get('NavigationCategoryTranslation') as $key => $value) {
            $validateNavigationCategoryTranslation = Validator::make($value, NavigationCategoryTranslation::$rules);
            if ($validateNavigationCategoryTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateNavigationCategoryTranslation->messages()->toArray());
            }
        }

        if ($validateNavigationCategory->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateNavigationCategory->messages()->toArray(), $validationMessages);
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

            // insert NavigationCategory
            $NavigationCategory = NavigationCategory::findOrFail($id);
            $NavigationCategory->key = Common::createKeyURL($request->input('NavigationCategoryTranslation.'.$languageDefault->code.'.name'));
            $NavigationCategory->parent_id = $request->input('NavigationCategory.parent_id');
            $NavigationCategory->priority = $request->input('NavigationCategory.priority');
            $NavigationCategory->is_publish = $request->input('NavigationCategory.is_publish');
            $NavigationCategory->created_by = $user->name;
            $NavigationCategory->updated_by = $user->name;
            $NavigationCategory->save();


            // save data languages
            foreach ($request->get('NavigationCategoryTranslation') as $locale => $value) {
                $NavigationCategory->translateOrNew($locale)->name = $request->input('NavigationCategoryTranslation.' .$locale. '.name');
                $NavigationCategory->translateOrNew($locale)->summary = $request->input('NavigationCategoryTranslation.' .$locale. '.summary');
            }

            $NavigationCategory->save();

        });

        return redirect()->route('admin.navigationcategories.index');
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
            $navigationCategory = NavigationCategory::findOrFail($id);
            $navigationCategory->updated_by = $user->name;
            $navigationCategory->deleted_by = $user->name;
            $navigationCategory->key = $navigationCategory->key.'-'.microtime(true);
            $navigationCategory->save();

            // soft delete
            $navigationCategory->delete();
        });
    }
}
