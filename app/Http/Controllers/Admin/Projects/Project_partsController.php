<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Project_part;
use App\Common;
use DB;
use Auth;

class Project_partsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request, $project_id)
	{
		$project = Project::findOrFail($project_id);
		$project_parts = Project_part::where('project_id', $project_id)->orderBy('priority')->get();
		if ($request->ajax()) {
			return $project_parts->toArray();
		}
		return view('admin.project_parts.index', ['project_parts' => $project_parts, 'project' => $project]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($project_id)
	{
		$project = Project::findOrFail($project_id);
		return view('admin.project_parts.create',['project' => $project]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $project_id)
	{
		// validate request
		$validateProject_part = Validator::make($request->get('Project_part'), Project_part::$rules);
		$validationMessages = [];

		if ($validateProject_part->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProject_part->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request, $project_id) {
			$user = $request->user();

			// insert Project_part
			$project_part = new Project_part;
        	$project_part->project_id = $project_id;
			$project_part->key = Common::createKeyURL($request->input('Project_part.name'));
        	$project_part->name = $request->input('Project_part.name');
			// get thumnail 
        	$project_part->thumnail = $request->input('Project_part.thumnail');
        	$project_part->link = $request->input('Project_part.link');
        	$project_part->type = $request->input('Project_part.type');
        	// $project_part->class = 'scroll';
        	$project_part->fa_icon = $request->input('Project_part.fa_icon');
        	$project_part->summary = $request->input('Project_part.summary');
        	$project_part->content = $request->input('Project_part.content');


			$project_part->priority = $request->input('Project_part.priority');
			$project_part->active = $request->input('Project_part.active');
			$project_part->created_by = $user->name;
			$project_part->updated_by = $user->name;


			$project_part->save();
		});

		return redirect()->route('admin.project_parts.index',['project_id' => $project_id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Project_part::with('project')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$project_part = Project_part::findOrFail($id);
		$project = Project::findOrFail($project_part->project_id);
		return view('admin.project_parts.edit', ['project_part' => $project_part, 'project' => $project]);
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
		$validateProject_part = Validator::make($request->get('Project_part'), Project_part::$rules);
		$validationMessages = [];

		if ($validateProject_part->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProject_part->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}
		
		// sure execute success, if not success rollback
		DB::transaction(function () use ($request, $id) {
			$user = $request->user();

			$project_part = Project_part::findOrFail($id);
			$project_part->key = Common::createKeyURL($request->input('Project_part.name'));
        	$project_part->name = $request->input('Project_part.name');
			// get thumnail 
        	$project_part->thumnail = $request->input('Project_part.thumnail');
        	$project_part->link = $request->input('Project_part.link');
        	$project_part->type = $request->input('Project_part.type');
        	// $project_part->class = 'scroll';
        	$project_part->fa_icon = $request->input('Project_part.fa_icon');
        	$project_part->summary = $request->input('Project_part.summary');
        	$project_part->content = $request->input('Project_part.content');

			$project_part->priority = $request->input('Project_part.priority');
			$project_part->active = $request->input('Project_part.active');
			$project_part->updated_by = $user->name;

			$project_part->save();

		});

		return redirect()->route('admin.project_parts.index', ['project_id' => 1]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		dd('sao lại xóa ?');	
		DB::transaction(function () use ($id) {
			$user = Auth::user();
			$project_part = Project_part::findOrFail($id);
			$project_part->updated_by = $user->name;
			$project_part->deleted_by = $user->name;
			$project_part->key = $project_part->key.'-'.microtime(true);
			$project_part->save();

			// soft delete
			$project_part->delete();
		});
	}
}
