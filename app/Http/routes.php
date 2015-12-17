<?php

/*
|--------------------------------------------------------------------------
| Application Routes Admin
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application admin.
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin.app'], 'namespace' => 'Admin'], function()
{
	// Controllers Within The "App\Http\Controllers\Admin" Namespace

	Route::group(['namespace' => 'Languages'], function()
	{
		Route::get('languages', [
			'as' => 'admin.languages.index',
			'uses' => 'LanguagesController@index'
		]);
	});

	Route::group(['namespace' => 'Dashboard'], function()
	{
		Route::get('dashboard', [
			'as' => 'admin.dashboard.index',
			'uses' => 'DashboardController@index'
		]);
		//Route::resource('dashboard', 'DashboardController'); 
	});

	Route::group(['namespace' => 'ArticleCategories'], function()
	{
		Route::resource('articlecategories', 'ArticleCategoriesController');
	});
	
	Route::group(['namespace' => 'Articles'], function()
	{
		Route::resource('articles', 'ArticlesController');
	});

	Route::group(['namespace' => 'Configs'], function()
	{
		Route::resource('configs', 'ConfigsController');
	});

	Route::group(['namespace' => 'Contacts'], function()
	{
		Route::resource('contacts', 'ContactsController');
	});

	Route::group(['namespace' => 'NavigationCategories'], function()
	{
		Route::resource('navigationcategories', 'NavigationCategoriesController');
	});

	Route::group(['namespace' => 'Navigations'], function()
	{
		Route::resource('navigations', 'NavigationsController');
	});

	Route::group(['namespace' => 'Tutors'], function()
	{
		Route::resource('tutors', 'TutorsController');
	});

	Route::group(['namespace' => 'Students'], function()
	{
		Route::resource('students', 'StudentsController');
	});

	Route::group(['namespace' => 'Users'], function()
	{
		Route::resource('users', 'UsersController');

		Route::get('changepassword', [
			'as' => 'admin.users.changepassword',
			'uses' => 'UsersController@changePassword'
		]);
		Route::post('changepassword', [
			'as' => 'admin.users.changepassword',
			'uses' => 'UsersController@updatePassword'
		]);
	});

	Route::group(['namespace' => 'Others'], function()
	{
		Route::resource('subjects', 'SubjectsController');
		Route::resource('provinces', 'ProvincesController');
		Route::resource('districts', 'DistrictsController');
		Route::resource('teachtimes', 'TeachTimesController');
		Route::resource('newclass', 'NewClassController');
	});

	Route::group(['namespace' => 'Uploads'], function()
	{
		Route::post('uploads', [
			'as' => 'admin.uploads.store',
			'uses' => 'UploadsController@store'
		]);
		Route::post('uploads/destroy', [
			'as' => 'admin.uploads.destroy',
			'uses' => 'UploadsController@destroy'
		]);
	});
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
	return view('welcome');
});*/


Route::group(['namespace' => 'Frontend'], function()
{
	Route::get('/', [
			'as' => 'homepage',
			'uses' => 'SiteControllers@index'
		]);
	Route::get('/lien-he.html', [
			'as' => 'contact',
			'uses' => 'SiteControllers@contact'
		]);
	Route::post('/lien-he.html', [
			'as' => 'contact',
			'uses' => 'SiteControllers@createContact'
		]);
	Route::get('/{categorykey}/{articlekey}.html', [
			'as' => 'article',
			'uses' => 'SiteControllers@article'
		]);
	Route::get('/search.html', [
			'as' => 'search',
			'uses' => 'SiteControllers@search'
		]);	
	Route::get('/gia-su-hien-co.html', [
			'as' => 'tutor',
			'uses' => 'SiteControllers@tutor'
		]);
	Route::get('/dang-ky-lam-gia-su.html', [
			'as' => 'tutorRegister',
			'uses' => 'SiteControllers@tutorRegister'
		]);

	Route::post('/dang-ky-lam-gia-su.html', [
			'as' => 'createTutorRegister',
			'uses' => 'SiteControllers@createTutorRegister'
		]);

	Route::get('/dang-ky-tim-gia-su.html', [
			'as' => 'studentRegister',
			'uses' => 'SiteControllers@studentRegister'
		]);

	Route::post('/dang-ky-tim-gia-su.html', [
			'as' => 'createStudentRegister',
			'uses' => 'SiteControllers@createStudentRegister'
		]);

	Route::get('/lop-moi.html', [
			'as' => 'newClass',
			'uses' => 'SiteControllers@newClass'
		]);
	Route::post('/lop-moi.html', [
			'as' => 'searchNewClass',
			'uses' => 'SiteControllers@searchNewClass'
		]);

	// for projects	
	Route::get('/du-an/{key}/{projectkey}.html', [
			'as' => 'project',
			'uses' => 'SiteControllers@project'
		]);
});