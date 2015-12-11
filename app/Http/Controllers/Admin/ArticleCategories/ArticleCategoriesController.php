<?php

namespace App\Http\Controllers\Admin\ArticleCategories;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ArticleCategory;
use App\ArticleCategoryTranslation;
use App\Language;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class ArticleCategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$articleCategories = ArticleCategory::orderBy('priority')->get();
		if ($request->ajax()) {
			return $articleCategories->toArray();
		}
		return view('admin.articlecategories.index', ['articleCategories' => $articleCategories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.articlecategories.create');
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
		$validateArticleCategory = Validator::make($request->get('ArticleCategory'), ArticleCategory::$rules);
		$validationMessages = [];

		foreach ($request->get('ArticleCategoryTranslation') as $key => $value) {
			$validateArticleCategoryTranslation = Validator::make($value, ArticleCategoryTranslation::$rules);
			if ($validateArticleCategoryTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateArticleCategoryTranslation->messages()->toArray());
			}
		}

		if ($validateArticleCategory->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateArticleCategory->messages()->toArray(), $validationMessages);
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

			// insert ArticleCategory
			$articleCategory = new ArticleCategory;
			$articleCategory->key = Common::createKeyURL($request->input('ArticleCategoryTranslation.'.$languageDefault->code.'.name'));
			$articleCategory->parent_id = $request->input('ArticleCategory.parent_id');
			$articleCategory->priority = $request->input('ArticleCategory.priority');
			$articleCategory->is_publish = $request->input('ArticleCategory.is_publish');
			$articleCategory->created_by = $user->name;
			$articleCategory->updated_by = $user->name;
			$articleCategory->save();

			// save attachments
			if ($request->input('ArticleCategory.attachments') != "") {
				$requestAttachments = explode(',', $request->input('ArticleCategory.attachments'));
				$attachments = [];
				foreach ($requestAttachments as $key => $value) {
					array_push($attachments, new Attachment([
						'entry_id' => $articleCategory->id,
						'table_name' => 'article_categories',
						'path' => $value,
						'priority' => 0,
						'is_publish' => 1
						]));
				}
				if (count($attachments) > 0) {
					$articleCategory->attachments()->saveMany($attachments);
				}
			}

			// save data languages
			foreach ($request->get('ArticleCategoryTranslation') as $locale => $value) {
				$articleCategory->translateOrNew($locale)->name = $request->input('ArticleCategoryTranslation.' .$locale. '.name');
				$articleCategory->translateOrNew($locale)->summary = $request->input('ArticleCategoryTranslation.' .$locale. '.summary');
				$articleCategory->translateOrNew($locale)->meta_description = $request->input('ArticleCategoryTranslation.' .$locale. '.meta_description');
				$articleCategory->translateOrNew($locale)->meta_keywords = $request->input('ArticleCategoryTranslation.' .$locale. '.meta_keywords');
			}

			$articleCategory->save();

		});

		return redirect()->route('admin.articlecategories.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return ArticleCategory::with('translations', 'attachments')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$articleCategory = ArticleCategory::findOrFail($id);
		return view('admin.articlecategories.edit', ['articleCategory' => $articleCategory]);
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
		$validateArticleCategory = Validator::make($request->get('ArticleCategory'), ArticleCategory::$rules);
		$validationMessages = [];

		foreach ($request->get('ArticleCategoryTranslation') as $key => $value) {
			$validateArticleCategoryTranslation = Validator::make($value, ArticleCategoryTranslation::$rules);
			if ($validateArticleCategoryTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateArticleCategoryTranslation->messages()->toArray());
			}
		}

		if ($validateArticleCategory->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateArticleCategory->messages()->toArray(), $validationMessages);
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

			// insert ArticleCategory
			$articleCategory = ArticleCategory::findOrFail($id);
			$articleCategory->key = Common::createKeyURL($request->input('ArticleCategoryTranslation.'.$languageDefault->code.'.name'));
			$articleCategory->parent_id = $request->input('ArticleCategory.parent_id');
			$articleCategory->priority = $request->input('ArticleCategory.priority');
			$articleCategory->is_publish = $request->input('ArticleCategory.is_publish');
			$articleCategory->created_by = $user->name;
			$articleCategory->updated_by = $user->name;
			$articleCategory->save();

			// save attachments
			// only insert or delete, not update
			if ($request->input('ArticleCategory.attachments') != "") {
				$currentAttachments = $articleCategory->attachments->lists('id');
				$requestAttachments = explode(',', $request->input('ArticleCategory.attachments'));
				$attachments = [];
				$keepAttachments = [];
				foreach ($requestAttachments as $key => $value) {
					if (strpos($value, '|') === false) {
						array_push($attachments, new Attachment([
							'entry_id' => $articleCategory->id,
							'table_name' => 'article_categories',
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
					$articleCategory->attachments()->saveMany($attachments);
				}
				// delete attachments
				foreach ($currentAttachments as $key => $value) {
					if (!in_array($value, $keepAttachments)) {
						Attachment::findOrFail($value)->delete();
					}
				}
			}

			// save data languages
			foreach ($request->get('ArticleCategoryTranslation') as $locale => $value) {
				$articleCategory->translateOrNew($locale)->name = $request->input('ArticleCategoryTranslation.' .$locale. '.name');
				$articleCategory->translateOrNew($locale)->summary = $request->input('ArticleCategoryTranslation.' .$locale. '.summary');
				$articleCategory->translateOrNew($locale)->meta_description = $request->input('ArticleCategoryTranslation.' .$locale. '.meta_description');
				$articleCategory->translateOrNew($locale)->meta_keywords = $request->input('ArticleCategoryTranslation.' .$locale. '.meta_keywords');
			}

			$articleCategory->save();

		});

		return redirect()->route('admin.articlecategories.index');
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
			$articleCategory = ArticleCategory::findOrFail($id);
			$articleCategory->updated_by = $user->name;
			$articleCategory->deleted_by = $user->name;
			$articleCategory->key = $articleCategory->key.'-'.microtime(true);
			$articleCategory->save();

			// soft delete
			$articleCategory->delete();
		});
	}
}
