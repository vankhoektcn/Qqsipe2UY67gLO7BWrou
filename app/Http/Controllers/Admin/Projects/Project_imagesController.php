<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project_image;
use DB;
use App\Common;
use Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class project_imagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project_images = Project_image::orderBy('priority')->get();
        if ($request->ajax()) {
            return $project_images->toArray();
        }
        return view('admin.project_images.index', ['project_images' => $project_images]);
    }

    public function project_imagesByProject($project_id)
    {
        $project_images = Project_image::where('project_id',$project_id)->orderBy('priority')->get();
        return $project_images->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project_images.create');
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
        $validateProject_image = Validator::make($request->get('Project_image'), Project_image::$rules);
        $validationMessages = [];

        foreach ($request->get('Project_imageTranslation') as $key => $value) {
            $validateProject_imageTranslation = Validator::make($value, Project_imageTranslation::$rules);
            if ($validateProject_imageTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateProject_imageTranslation->messages()->toArray());
            }
        }

        if ($validateProject_image->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProject_image->messages()->toArray(), $validationMessages);
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

            // insert Project_image
            $project_image = new Project_image;
            $project_image->key = Common::createKeyURL($request->input('Project_imageTranslation.'.$languageDefault->code.'.name'));
            $project_image->province_id = $request->input('Project_image.province_id');
            $project_image->priority = $request->input('Project_image.priority');
            $project_image->is_publish = $request->input('Project_image.is_publish');
            $project_image->created_by = $user->name;
            $project_image->updated_by = $user->name;
            $project_image->save();

            // save data languages
            foreach ($request->get('Project_imageTranslation') as $locale => $value) {
                $project_image->translateOrNew($locale)->name = $request->input('Project_imageTranslation.' .$locale. '.name');
            }


            $project_image->save();

        });

        return redirect()->route('admin.project_images.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $project_image = Project_image::with('translations')->findOrFail($id)->toArray();
        $provinces = province::where('is_publish',1)->orderBy('priority')->get()->toArray();
        return ['project_image' => $project_image, 'provinces' => $provinces];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_image = Project_image::findOrFail($id);
        return view('admin.project_images.edit', ['project_image' => $project_image]);
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
        $validateProject_image = Validator::make($request->get('Project_image'), Project_image::$rules);
        $validationMessages = [];

        foreach ($request->get('Project_imageTranslation') as $key => $value) {
            $validateProject_imageTranslation = Validator::make($value, Project_imageTranslation::$rules);
            if ($validateProject_imageTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateProject_imageTranslation->messages()->toArray());
            }
        }

        if ($validateProject_image->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProject_image->messages()->toArray(), $validationMessages);
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

            // insert Project_image
            $project_image = Project_image::findOrFail($id);
            $project_image->key = Common::createKeyURL($request->input('Project_imageTranslation.'.$languageDefault->code.'.name'));
            $project_image->province_id = $request->input('Project_image.province_id');
            $project_image->priority = $request->input('Project_image.priority');
            $project_image->is_publish = $request->input('Project_image.is_publish');
            $project_image->created_by = $user->name;
            $project_image->updated_by = $user->name;
            $project_image->save();

            // save data languages
            foreach ($request->get('Project_imageTranslation') as $locale => $value) {
                $project_image->translateOrNew($locale)->name = $request->input('Project_imageTranslation.' .$locale. '.name');
            }

            $project_image->save();

        });

        return redirect()->route('admin.project_images.index');

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
            $project_image = Project_image::findOrFail($id);
            $project_image->updated_by = $user->name;
            $project_image->deleted_by = $user->name;
            $project_image->save();

            // soft delete
            $project_image->delete();

            if(!is_null($project_image->path) )// && File::exists(base_path().$filePath))
            {
                Storage::disk('image')->delete(str_replace('/uploads/', '', $project_image->path));
            }
        });

    }
}
