<?php

namespace App\Http\Controllers\Admin\Articles;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Article;
use App\ArticleTranslation;
use App\Language;
use App\Common;
use App\Attachment;
use DB;
use Auth;

class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$articles = Article::orderBy('priority')->get();
		if ($request->ajax()) {
			return $articles->toArray();
		}
		return view('admin.articles.index', ['articles' => $articles]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.articles.create');
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
		$validateArticle = Validator::make($request->get('Article'), Article::$rules);
		$validationMessages = [];

		foreach ($request->get('ArticleTranslation') as $key => $value) {
			$validateArticleTranslation = Validator::make($value, ArticleTranslation::$rules);
			if ($validateArticleTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateArticleTranslation->messages()->toArray());
			}
		}

		if ($validateArticle->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateArticle->messages()->toArray(), $validationMessages);
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

			// insert Article
			$article = new Article;
			$article->key = Common::createKeyURL($request->input('ArticleTranslation.'.$languageDefault->code.'.name'));
			$article->priority = $request->input('Article.priority');
			$article->is_publish = $request->input('Article.is_publish');
			$article->created_by = $user->name;
			$article->updated_by = $user->name;
			$article->save();

			// sync categories
			if ($request->input('Article.categories') != "") {
				$categories =  explode(",",$request->input('Article.categories'));
				if (count($categories) > 0) {
					$article->categories()->attach($categories);
				}
			}

			// save attachments
			if ($request->input('Article.attachments') != "") {
				$requestAttachments = explode(',', $request->input('Article.attachments'));
				$attachments = [];
				foreach ($requestAttachments as $key => $value) {
					array_push($attachments, new Attachment([
						'entry_id' => $article->id,
						'table_name' => 'articles',
						'path' => $value,
						'priority' => 0,
						'is_publish' => 1
						]));
				}
				if (count($attachments) > 0) {
					$article->attachments()->saveMany($attachments);
				}
			}

			// save data languages
			foreach ($request->get('ArticleTranslation') as $locale => $value) {
				$article->translateOrNew($locale)->name = $request->input('ArticleTranslation.' .$locale. '.name');
				$article->translateOrNew($locale)->summary = $request->input('ArticleTranslation.' .$locale. '.summary');
				$article->translateOrNew($locale)->content = $request->input('ArticleTranslation.' .$locale. '.content');
				$article->translateOrNew($locale)->meta_description = $request->input('ArticleTranslation.' .$locale. '.meta_description');
				$article->translateOrNew($locale)->meta_keywords = $request->input('ArticleTranslation.' .$locale. '.meta_keywords');
			}

			$article->save();

		});

		return redirect()->route('admin.articles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return Article::with('translations', 'categories', 'attachments')->findOrFail($id)->toArray();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
		return view('admin.articles.edit', ['article' => $article]);
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
		$validateArticle = Validator::make($request->get('Article'), Article::$rules);
		$validationMessages = [];

		foreach ($request->get('ArticleTranslation') as $key => $value) {
			$validateArticleTranslation = Validator::make($value, ArticleTranslation::$rules);
			if ($validateArticleTranslation->fails()){
				$validationMessages = array_merge_recursive($validationMessages, $validateArticleTranslation->messages()->toArray());
			}
		}

		if ($validateArticle->fails() OR count($validationMessages) > 0) {
			$validationMessages = array_merge_recursive($validateArticle->messages()->toArray(), $validationMessages);
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

			// insert Article
			$article = Article::findOrFail($id);
			$article->key = Common::createKeyURL($request->input('ArticleTranslation.'.$languageDefault->code.'.name'));
			$article->priority = $request->input('Article.priority');
			$article->is_publish = $request->input('Article.is_publish');
			$article->created_by = $user->name;
			$article->updated_by = $user->name;
			$article->save();

			// sync categories
			$article->categories()->detach();
			if ($request->input('Article.categories') != "") {
				$categories =  explode(",",$request->input('Article.categories'));
				if (count($categories) > 0) {
					$article->categories()->attach($categories);
				}
			}

			// save attachments
			// only insert or delete, not update
			if ($request->input('Article.attachments') != "") {
				$currentAttachments = $article->attachments->lists('id');
				$requestAttachments = explode(',', $request->input('Article.attachments'));
				$attachments = [];
				$keepAttachments = [];
				foreach ($requestAttachments as $key => $value) {
					if (strpos($value, '|') === false) {
						array_push($attachments, new Attachment([
							'entry_id' => $article->id,
							'table_name' => 'articles',
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
					$article->attachments()->saveMany($attachments);
				}
				// delete attachments
				foreach ($currentAttachments as $key => $value) {
					if (!in_array($value, $keepAttachments)) {
						Attachment::findOrFail($value)->delete();
					}
				}
			}

			// save data languages
			foreach ($request->get('ArticleTranslation') as $locale => $value) {
				$article->translateOrNew($locale)->name = $request->input('ArticleTranslation.' .$locale. '.name');
				$article->translateOrNew($locale)->summary = $request->input('ArticleTranslation.' .$locale. '.summary');
				$article->translateOrNew($locale)->content = $request->input('ArticleTranslation.' .$locale. '.content');
				$article->translateOrNew($locale)->meta_description = $request->input('ArticleTranslation.' .$locale. '.meta_description');
				$article->translateOrNew($locale)->meta_keywords = $request->input('ArticleTranslation.' .$locale. '.meta_keywords');
			}

			$article->save();

		});

		return redirect()->route('admin.articles.index');
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
			$article = Article::findOrFail($id);
			$article->updated_by = $user->name;
			$article->deleted_by = $user->name;
			$article->key = $article->key.'-'.microtime(true);
			$article->save();

			// soft delete
			$article->delete();
		});
	}
}
