<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project_type;
use DB;
use App\Common;
use Auth;

class Project_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project_types = Project_type::all();
        if ($request->ajax()) {
            return $project_types->toArray();
        }
        return view('admin.project_types.index', ['project_types' => $project_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project_types.create');
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
        $validateProject_type = Validator::make($request->get('Project_type'), Project_type::$rules);
        $validationMessages = [];

        if ($validateProject_type->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProject_type->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request) {
            $user = $request->user();

            // insert Project_type
            $project_type = new Project_type;
            $project_type->key = Common::createKeyURL($request->input('Project_type.name'));
            $project_type->priority = $request->input('Project_type.priority');
            $project_type->meta_description = $request->input('Project_type.meta_description');
            $project_type->meta_keywords = $request->input('Project_type.meta_keywords');
            $project_type->is_publish = $request->input('Project_type.is_publish');
            $project_type->created_by = $user->name;
            $project_type->updated_by = $user->name;
            $project_type->save();


        });

        return redirect()->route('admin.project_types.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Project_type::with('translations')->findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_type = Project_type::findOrFail($id);
        return view('admin.project_types.edit', ['project_type' => $project_type]);
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
        $validateProject_type = Validator::make($request->get('Project_type'), Project_type::$rules);
        $validationMessages = [];


        if ($validateProject_type->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateProject_type->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $id) {
            $user = $request->user();

            // insert Project_type
            $project_type = Project_type::findOrFail($id);
            $project_type->key = Common::createKeyURL($request->input('Project_type.name'));
            $project_type->meta_description = $request->input('Project_type.meta_description');
            $project_type->meta_keywords = $request->input('Project_type.meta_keywords');
            $project_type->priority = $request->input('Project_type.priority');
            $project_type->is_publish = $request->input('Project_type.is_publish');
            $project_type->created_by = $user->name;
            $project_type->updated_by = $user->name;
            $project_type->save();

        });

        return redirect()->route('admin.project_types.index');

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
            $project_type = Project_type::findOrFail($id);
            $project_type->updated_by = $user->name;
            $project_type->deleted_by = $user->name;
            $project_type->key = $project_type->key.'-'.microtime(true);
            $project_type->save();

            // soft delete
            $project_type->delete();
        });
    }
}
