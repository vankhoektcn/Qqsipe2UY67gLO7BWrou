<?php

namespace App\Http\Controllers\Admin\Navigations;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Navigation;
use App\NavigationTranslation;
use App\Language;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class NavigationsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$navigations = Navigation::orderBy('priority')->get();
		if ($request->ajax()) {
			return $navigations->toArray();
		}
		return view('admin.navigations.index', ['navigations' => $navigations]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.navigations.create');
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
		$validateNavigation = Validator::make($request->get('Navigation'), Navigation::$rules);
		$validationMessages = [];

		foreach ($request->get('NavigationTranslation') as $key => $value) {
			$validateNavigationTranslation = Validator::make($value, NavigationTranslation::$rules);
			if ($validateNavigationTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateNavigationTranslation->messages()->toArray());
			}
		}

		if ($validateNavigation->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateNavigation->messages()->toArray(), $validationMessages);
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

			// insert Navigation
			$navigation = new Navigation;
			$navigation->key = Common::createKeyURL($request->input('NavigationTranslation.'.$languageDefault->code.'.name'));
			$navigation->navigation_category_id = $request->input('Navigation.navigation_category_id');
			$navigation->priority = $request->input('Navigation.priority');
			$navigation->is_publish = $request->input('Navigation.is_publish');
			$navigation->created_by = $user->name;
			$navigation->updated_by = $user->name;
			$navigation->save();

			// save attachments
			if ($request->input('Navigation.attachments') != "") {
				$requestAttachments = explode(',', $request->input('Navigation.attachments'));
				$attachments = [];
				foreach ($requestAttachments as $key => $value) {
					array_push($attachments, new Attachment([
						'entry_id' => $navigation->id,
						'table_name' => 'navigations',
						'path' => $value,
						'priority' => 0,
						'is_publish' => 1
						]));
				}
				if (count($attachments) > 0) {
					$navigation->attachments()->saveMany($attachments);
				}
			}

			// save data languages
			foreach ($request->get('NavigationTranslation') as $locale => $value) {
				$navigation->translateOrNew($locale)->name = $request->input('NavigationTranslation.' .$locale. '.name');
				$navigation->translateOrNew($locale)->summary = $request->input('NavigationTranslation.' .$locale. '.summary');
				$navigation->translateOrNew($locale)->link = $request->input('NavigationTranslation.' .$locale. '.link');
			}

			$navigation->save();

		});

		return redirect()->route('admin.navigations.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Navigation::with('translations', 'attachments')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$navigation = Navigation::findOrFail($id);
		return view('admin.navigations.edit', ['navigation' => $navigation]);
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
		$validateNavigation = Validator::make($request->get('Navigation'), Navigation::$rules);
		$validationMessages = [];

		foreach ($request->get('NavigationTranslation') as $key => $value) {
			$validateNavigationTranslation = Validator::make($value, NavigationTranslation::$rules);
			if ($validateNavigationTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateNavigationTranslation->messages()->toArray());
			}
		}

		if ($validateNavigation->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateNavigation->messages()->toArray(), $validationMessages);
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

			// insert Navigation
			$navigation = Navigation::findOrFail($id);
			$navigation->key = Common::createKeyURL($request->input('NavigationTranslation.'.$languageDefault->code.'.name'));
			$navigation->navigation_category_id = $request->input('Navigation.navigation_category_id');
			$navigation->priority = $request->input('Navigation.priority');
			$navigation->is_publish = $request->input('Navigation.is_publish');
			$navigation->created_by = $user->name;
			$navigation->updated_by = $user->name;
			$navigation->save();

			// save attachments
			// only insert or delete, not update
			if ($request->input('Navigation.attachments') != "") {
				$currentAttachments = $navigation->attachments->lists('id');
				$requestAttachments = explode(',', $request->input('Navigation.attachments'));
				$attachments = [];
				$keepAttachments = [];
				foreach ($requestAttachments as $key => $value) {
					if (strpos($value, '|') === false) {
						array_push($attachments, new Attachment([
							'entry_id' => $navigation->id,
							'table_name' => 'Navigations',
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
					$navigation->attachments()->saveMany($attachments);
				}
				// delete attachments
				foreach ($currentAttachments as $key => $value) {
					if (!in_array($value, $keepAttachments)) {
						Attachment::findOrFail($value)->delete();
					}
				}
			}

			// save data languages
			foreach ($request->get('NavigationTranslation') as $locale => $value) {
				$navigation->translateOrNew($locale)->name = $request->input('NavigationTranslation.' .$locale. '.name');
				$navigation->translateOrNew($locale)->summary = $request->input('NavigationTranslation.' .$locale. '.summary');
				$navigation->translateOrNew($locale)->link = $request->input('NavigationTranslation.' .$locale. '.link');
			}

			$navigation->save();

		});

		return redirect()->route('admin.navigations.index');
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
			$navigation = Navigation::findOrFail($id);
			$navigation->updated_by = $user->name;
			$navigation->deleted_by = $user->name;
			$navigation->key = $navigation->key.'-'.microtime(true);
			$navigation->save();

			// soft delete
			$navigation->delete();
		});
	}
}
