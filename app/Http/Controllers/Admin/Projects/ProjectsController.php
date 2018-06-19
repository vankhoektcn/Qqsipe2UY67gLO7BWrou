<?php

namespace App\Http\Controllers\Admin\Projects;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project;
use App\Project_image;
use App\Project_part;
use App\Language;
use App\Common;
use DB;
use Auth;

class ProjectsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$projects = Project::orderBy('priority')->get();
		if ($request->ajax()) {
			return $projects->toArray();
		}
		return view('admin.projects.index', ['projects' => $projects]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.projects.create');
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
		$validateProject = Validator::make($request->get('Project'), Project::$rules);
		$validationMessages = [];

		if ($validateProject->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProject->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		//DB::transaction(function () use ($request) {
			$user = $request->user();

			// insert Project
			$project = new Project;
			$project->key = Common::createKeyURL($request->input('Project.name'));
			$project->name = $request->input('Project.name');
			$project->project_type_id = $request->input('Project.project_type_id');
			$project->province_id = $request->input('Project.province_id');
			$project->district_id = $request->input('Project.district_id');
			$project->ward_id = $request->input('Project.ward_id');
			$project->street_id = $request->input('Project.street_id');
			$project->address = $request->input('Project.address');
			$project->hotline = $request->input('Project.hotline');
			$project->hotline_fa_icon = $request->input('Project.hotline_fa_icon');
			$project->email = $request->input('Project.email');

			$project_images = [];
			$project_image_path = $request->input('project_image.path');
			$project_image_title = $request->input('project_image.title');
			$project_image_caption = $request->input('project_image.caption');
			$project_image_active = $request->input('project_image.active');	
			//dd($project_image_active);
			$agents = $request->input('Project.agents');

			/*if(empty($project_image_path) || empty($agents))
			{
				return redirect()->back()->withErrors("Kiểm tra lại hình ảnh, nhân viên môi giới.");
			}*/

			$project->logo = $request->input('Project.logo');
			$project->show_slide = $request->input('Project.show_slide');
			$project->summary = $request->input('Project.summary');
			$project->content = $request->input('Project.content');
			$project->map_latitude = $request->input('Project.map_latitude');
			$project->map_longitude = $request->input('Project.map_longitude');

			$project->meta_description = $request->input('Project.meta_description');
			$project->meta_keywords = $request->input('Project.meta_keywords');
			

			$project->priority = $request->input('Project.priority');
			$project->active = $request->input('Project.active');
			//dd($project_image_path);
			//dd($project_image_title);
			//dd($project_image_caption);
			//dd($project_image_active[1]);
			$project->created_by = $user->name;
			$project->updated_by = $user->name;
			$project->save();

			// sync categories
			if ($request->input('Project.categories') != "") {
				$categories =  explode(",",$request->input('Project.categories'));
				if (count($categories) > 0) {
					$project->categories()->attach($categories);
				}
			}

			// push project_images
			if(!empty($project_image_path) && count($project_image_path) > 0){
				foreach ($project_image_path as $key => $value) {
					array_push($project_images, new Project_image([
						'project_id' => $project->id,
						'path' => $project_image_path[$key],
						'title' => $project_image_title[$key],
						'caption' => $project_image_caption[$key],
						'active' => isset($project_image_active[$key]) ? $project_image_active[$key]: 0
					]));
				}
				$project->project_images()->saveMany($project_images);
			}
			// sync categories
			if ($agents && $agents != ''){
				$arrAgents =  explode(",",$agents);
				if (count($arrAgents) > 0) {
					$project->agents()->attach($arrAgents);
				}
			}

			// Face project_part
			$project_part_name = ['Vị trí','Tiện ích','Mặt bằng'
            ,'Nhà mẫu','Thanh toán'];
			$project_part_type = ['E','E','E'
			,'E','E'];
            $project_part_link = ['project-location','project-utility','project-ground'
            ,'project-form','project-payment'];
			$project_part_fa_icon = ['fa fa-map-marker','fa fa-object-group','fa fa-database'
			,'fa fa-home','fa fa-money'];
            $project_part_summary = ['Mô tả ngắn gọn Vị trí','Mô tả ngắn gọn Tiện ích','Mô tả ngắn gọn Mặt bằng'
            ,'Mô tả ngắn gọn Nhà mẫu','Mô tả ngắn gọn Thanh toán'];
        	$project_part_content = ['Nội dung Vị trí','Nội dung Tiện ích','Nội dung Mặt bằng'
            ,'Nội dung Nhà mẫu','Nội dung Thanh toán'];

        	foreach ($project_part_name as $key => $name) {	
        		$project_part = Project_part::create([
        			'project_id' => $project->id,
					'key' => Common::createKeyURL($name),
					'name' => $name,
					'link' => $project_part_link[$key],
					'class' => 'scroll',
					'type' => $project_part_type[$key],
					'fa_icon' => $project_part_fa_icon[$key],
					'sumary' => $project_part_summary[$key],
					'content' => $project_part_content[$key],
					'priority' => $key,
					'active' => 1,
					'created_by' => 'vankhoe',
					'updated_by' => 'vankhoe'
				]);
        	}
			// End Face project_part

			$project->save();

		//});

		return redirect()->route('admin.projects.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Project::with('categories', 'project_images', 'agents', 'project_parts')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$project = Project::findOrFail($id);
		// dd($project);
		return view('admin.projects.edit', ['project' => $project]);
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
		$validateProject = Validator::make($request->get('Project'), Project::$rules);
		$validationMessages = [];

		if ($validateProject->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateProject->messages()->toArray(), $validationMessages);
			return redirect()->back()->withErrors($validationMessages)->withInput();
		}

		// sure execute success, if not success rollback
		DB::transaction(function () use ($request, $id) {
			try{
				$user = $request->user();

				// insert Project
				$project = Project::findOrFail($id);
				if($request->input('Project.key')){
					$project->key = $request->input('Project.key');//Common::createKeyURL($request->input('Project.name'));
				} else
					$project->key = Common::createKeyURL($request->input('Project.name'));
				$project->name = $request->input('Project.name');
				$project->project_type_id = $request->input('Project.project_type_id');
				$project->province_id = $request->input('Project.province_id');
				$project->district_id = $request->input('Project.district_id');
				$project->ward_id = $request->input('Project.ward_id');
				$project->street_id = $request->input('Project.street_id');
				$project->address = $request->input('Project.address');
				$project->hotline = $request->input('Project.hotline');
				$project->hotline_fa_icon = $request->input('Project.hotline_fa_icon');
				$project->email = $request->input('Project.email');

				$project_images = [];
				$project_image_path = $request->input('project_image.path');
				$project_image_title = $request->input('project_image.title');
				$project_image_caption = $request->input('project_image.caption');
				$project_image_active = $request->input('project_image.active');	
				//dd($project_image_path);
				$agents = $request->input('Project.agents');

				if(empty($project_image_path))
				{
					return redirect()->back()->withErrors("Kiểm tra lại hình ảnh");
				}

				$project->logo = $request->input('Project.logo');
				$project->show_slide = $request->input('Project.show_slide');
				$project->summary = $request->input('Project.summary');
				$project->content = $request->input('Project.content');
				$project->map_latitude = $request->input('Project.map_latitude');
				$project->map_longitude = $request->input('Project.map_longitude');

				$project->meta_description = $request->input('Project.meta_description');
				$project->meta_keywords = $request->input('Project.meta_keywords');
				

				$project->priority = $request->input('Project.priority');
				$project->active = $request->input('Project.active');
				$project->updated_by = $user->name;
				$project->save();

				// sync categories
				$project->categories()->detach();
				if ($request->input('Project.categories') != "") {
					$categories =  explode(",",$request->input('Project.categories'));
					if (count($categories) > 0) {
						$project->categories()->attach($categories);
					}
				}

				// push project_images
				if(!empty($project_image_path) && count($project_image_path) > 0){
					foreach ($project_image_path as $key => $value) {
						array_push($project_images, new Project_image([
							'project_id' => $project->id,
							'path' => $project_image_path[$key],
							'title' => $project_image_title[$key],
							'caption' => $project_image_caption[$key],
							'active' => isset($project_image_active[$key]) ? $project_image_active[$key]: 0
						]));
					}
					$project->project_images()->delete();
					$project->project_images()->saveMany($project_images);
				}
				// sync categories
				if ($agents && $agents != ''){
					$arrAgents =  explode(",",$agents);
					if (count($arrAgents) > 0) {
						$project->agents()->sync($arrAgents);
					}
				}

				$project->save();
			} catch(Exception $e){
				dd($e);
				return redirect()->back()->withErrors($e);
			};

		});

		return redirect()->route('admin.projects.index');
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
			$project = Project::findOrFail($id);
			$project->updated_by = $user->name;
			$project->deleted_by = $user->name;
			$project->key = $project->key.'-'.microtime(true);
			$project->save();

			// soft delete
			$project->delete();
		});
	}
}
