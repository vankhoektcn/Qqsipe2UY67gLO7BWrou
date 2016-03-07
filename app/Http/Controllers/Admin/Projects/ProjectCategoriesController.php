<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ProjectCategory;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class ProjectCategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$projectCategories = ProjectCategory::orderBy('priority')->get();
		if ($request->ajax()) {
			return $projectCategories->toArray();
		}
		return view('admin.project_categories.index', ['projectCategories' => $projectCategories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.project_categories.create');
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
		$validateProjectCategory = Validator::make($request->get('ProjectCategory'), ProjectCategory::$rules);
		$validationMessages = [];

		if ($validateProjectCategory->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProjectCategory->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request) {
			$user = $request->user();

			// insert ProjectCategory
			$projectCategory = new ProjectCategory;
			$projectCategory->key = Common::createKeyURL($request->input('ProjectCategory.name'));
			$projectCategory->parent_id = $request->input('ProjectCategory.parent_id');
			$projectCategory->priority = $request->input('ProjectCategory.priority');

			$projectCategory->name = $request->input('ProjectCategory.name');
			$projectCategory->summary = $request->input('ProjectCategory.summary');
			$projectCategory->meta_description = $request->input('ProjectCategory.meta_description');
			$projectCategory->meta_keywords = $request->input('ProjectCategory.meta_keywords');

			$projectCategory->active = $request->input('ProjectCategory.active');
			$projectCategory->created_by = $user->name;
			$projectCategory->updated_by = $user->name;
			$projectCategory->save();

			// save attachments
			if ($request->input('ProjectCategory.attachments') != "") {
				$requestAttachments = explode(',', $request->input('ProjectCategory.attachments'));
				$attachments = [];
				foreach ($requestAttachments as $key => $value) {
					array_push($attachments, new Attachment([
						'entry_id' => $projectCategory->id,
						'table_name' => 'project_categories',
						'path' => $value,
						'priority' => 0,
						'active' => 1
						]));
				}
				if (count($attachments) > 0) {
					$projectCategory->attachments()->saveMany($attachments);
				}
			}

		});

		return redirect()->route('admin.projectcategories.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return ProjectCategory::with('attachments')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$projectCategory = ProjectCategory::findOrFail($id);
		return view('admin.project_categories.edit', ['projectCategory' => $projectCategory]);
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
		$validateProjectCategory = Validator::make($request->get('ProjectCategory'), ProjectCategory::$rules);
		$validationMessages = [];

		if ($validateProjectCategory->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProjectCategory->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request, $id) {
			$user = $request->user();

			// insert ProjectCategory
			$projectCategory = ProjectCategory::findOrFail($id);
			$projectCategory->key = Common::createKeyURL($request->input('ProjectCategory.name'));
			$projectCategory->parent_id = $request->input('ProjectCategory.parent_id');
			$projectCategory->priority = $request->input('ProjectCategory.priority');

			$projectCategory->name = $request->input('ProjectCategory.name');
			$projectCategory->summary = $request->input('ProjectCategory.summary');
			$projectCategory->meta_description = $request->input('ProjectCategory.meta_description');
			$projectCategory->meta_keywords = $request->input('ProjectCategory.meta_keywords');

			$projectCategory->active = $request->input('ProjectCategory.active');
			$projectCategory->created_by = $user->name;
			$projectCategory->updated_by = $user->name;
			$projectCategory->save();

			// save attachments
			// only insert or delete, not update
			if ($request->input('ProjectCategory.attachments') != "") {
				$currentAttachments = $projectCategory->attachments->lists('id');
				$requestAttachments = explode(',', $request->input('ProjectCategory.attachments'));
				$attachments = [];
				$keepAttachments = [];
				foreach ($requestAttachments as $key => $value) {
					if (strpos($value, '|') === false) {
						array_push($attachments, new Attachment([
							'entry_id' => $projectCategory->id,
							'table_name' => 'project_categories',
							'path' => $value,
							'priority' => 0,
							'active' => 1
						]));
					}
					else {
						$attachmentId = explode('|', $value)[0];
						array_push($keepAttachments, $attachmentId);
					}
				}
				if (count($attachments) > 0) {
					$projectCategory->attachments()->saveMany($attachments);
				}
				// delete attachments
				foreach ($currentAttachments as $key => $value) {
					if (!in_array($value, $keepAttachments)) {
						Attachment::findOrFail($value)->delete();
					}
				}
			}

		});

		return redirect()->route('admin.projectcategories.index');
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
			$projectCategory = ProjectCategory::findOrFail($id);
			$projectCategory->updated_by = $user->name;
			$projectCategory->deleted_by = $user->name;
			$projectCategory->key = $projectCategory->key.'-'.microtime(true);
			$projectCategory->save();

			// soft delete
			$projectCategory->delete();
		});
	}
}
