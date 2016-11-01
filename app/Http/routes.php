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

	Route::group(['namespace' => 'Products'], function()
	{
		Route::resource('products', 'ProductsController');
		Route::resource('product_types', 'Product_typesController');
	});

// PROJECT
	Route::group(['namespace' => 'Projects'], function()
	{
		Route::resource('project_types', 'Project_typesController');
		Route::resource('projectcategories', 'ProjectCategoriesController');
		Route::resource('projects', 'ProjectsController');
		Route::resource('project_images', 'Project_imagesController');
		//Route::resource('project_parts', 'Project_partsController');
		Route::get('/{project_id}/project_parts', [
			'as' => 'admin.project_parts.index',
			'uses' => 'Project_partsController@index'
		]);
		//create project_parts
		Route::get('/{project_id}/project_parts/create', [
			'as' => 'admin.project_parts.create',
			'uses' => 'Project_partsController@create'
		]);
		//create project_parts
		Route::post('/{project_id}/project_parts/create', [
			'as' => 'admin.project_parts.store',
			'uses' => 'Project_partsController@store'
		]);
		// show project_parts
		Route::get('/project_parts/{id}', [
			'as' => 'admin.project_parts.show',
			'uses' => 'Project_partsController@show'
		]);
		// get edit project_parts
		Route::get('/project_parts/{id}/edit', [
			'as' => 'admin.project_parts.edit',
			'uses' => 'Project_partsController@edit'
		]);
		// update project_parts
		Route::put('/project_parts/{id}', [
			'as' => 'admin.project_parts.update',
			'uses' => 'Project_partsController@update'
		]);
		// delete project_parts
		Route::delete('/project_parts/{id}', [
			'as' => 'admin.project_parts.delete',
			'uses' => 'Project_partsController@destroy'
		]);
	});

	Route::group(['namespace' => 'Agents'], function()
	{
		Route::resource('agents', 'AgentsController');
	});
// END PROJECT
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

		Route::get('/districts-by-province/{province_id}', [
			'as' => 'admin.districts.byprovince',
			'uses' => 'DistrictsController@districtsByProvince'
		]);
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
	
/***************************** FOR PROJECTS  ******************************/
	// ALL	
	Route::get('/du-an.html', [
			'as' => 'projects',
			'uses' => 'SiteControllers@projects'
		]);

	// SEARCH
	//PRODUCT_TYPE
	Route::get('/du-an/{project_type_key}.html', [
			'as' => 'project_type',
			'uses' => 'SiteControllers@project_type'
		]);	
	//PRODUCT_TYPE vs PROVINCE
	Route::get('/du-an/{project_type_key}/{province_key}.html', [
			'as' => 'project_type_province',
			'uses' => 'SiteControllers@project_type_province'
		]);
	//PRODUCT_TYPE vs PROVINCE vs DISTRICT
	Route::get('/du-an/{project_type_key}/{province_key}/{district_key}.html', [
			'as' => 'project_type_province_district',
			'uses' => 'SiteControllers@project_type_province_district'
		]);
	//PRODUCT_TYPE vs PROVINCE vs DISTRICT vs WARD
	Route::get('/du-an/{project_type_key}/{province_key}/{district_key}/{ward_key}.html', [
			'as' => 'project_type_province_district_ward',
			'uses' => 'SiteControllers@project_type_province_district_ward'
		]);
	Route::get('/thong-tin-du-an/{project_id}/{project_key}.html', [
			'as' => 'project_detail',
			'uses' => 'SiteControllers@project_detail'
		]);
	Route::get('/thong-tin-du-an/{project_id}/{project_key}/{project_part_id}/{project_part_key}.html', [
			'as' => 'project_part',
			'uses' => 'SiteControllers@project_part'
		]);
	Route::get('/tim-kiem-du-an.html', [
		'as' => 'project_search',
		'uses' => 'SiteControllers@project_search'
	]);	
/***************************** end FOR PROJECTS  ******************************/
	/*// ALL	
	Route::get('/du-an.html', [
			'as' => 'du_an',
			'uses' => 'SiteControllers@du_an'
		]);
	// SEARCH
		Route::get('/tim-kiem-du-an.html', [
			'as' => 'project_search',
			'uses' => 'SiteControllers@project_search'
		]);	
	// PROJECT_TYPE
	Route::get('/du-an/{producttypekey}.html', [
			'as' => 'project_type',
			'uses' => 'SiteControllers@project_type'
		]);
	Route::get('/du-an/{districtkey}/{projectkey}.html', [
			'as' => 'project',
			'uses' => 'SiteControllers@project'
		]);
	Route::get('/du-an/{districtkey}/{projectkey}/{projectpartid}/{projectpartkey}.html', [
			'as' => 'project_part',
			'uses' => 'SiteControllers@project_part'
		]);*/

/***************************** FOR PRODUCT  ******************************/
	// ALL	
	Route::get('/can-ho.html', [
			'as' => 'products',
			'uses' => 'SiteControllers@products'
		]);

	// SEARCH
	//PRODUCT_TYPE
	Route::get('/can-ho/{product_type_key}.html', [
			'as' => 'product_type',
			'uses' => 'SiteControllers@product_type'
		]);	
	//PRODUCT_TYPE vs PROVINCE
	Route::get('/can-ho/{product_type_key}/{province_key}.html', [
			'as' => 'product_type_province',
			'uses' => 'SiteControllers@product_type_province'
		]);
	//PRODUCT_TYPE vs PROVINCE vs DISTRICT
	Route::get('/can-ho/{product_type_key}/{province_key}/{district_key}.html', [
			'as' => 'product_type_province_district',
			'uses' => 'SiteControllers@product_type_province_district'
		]);
	//PRODUCT_TYPE vs PROVINCE vs DISTRICT vs WARD
	Route::get('/can-ho/{product_type_key}/{province_key}/{district_key}/{ward_key}.html', [
			'as' => 'product_type_province_district_ward',
			'uses' => 'SiteControllers@product_type_province_district_ward'
		]);
	Route::get('/thong-tin-can-ho/{product_id}/{product_key}.html', [
			'as' => 'product_detail',
			'uses' => 'SiteControllers@product_detail'
		]);
	Route::get('/tim-kiem-can-ho.html', [
		'as' => 'product_search',
		'uses' => 'SiteControllers@product_search'
	]);	



	//PROJECT DETAIL QVRENTY &&  DISTRICT RELATED
	Route::get('/{project_key}', [
		'as' => 'project_detail_qvrenty',
		'uses' => 'SiteControllers@project_detail_qvrenty'
	]);
/***************************** end FOR PRODUCT  ******************************/

/***************************** FOR ARTICLE  ******************************/
	// ALL	
	Route::get('/tin-tuc.html', [
			'as' => 'articles',
			'uses' => 'SiteControllers@articles'
		]);
	
	//PRODUCT_TYPE
	Route::get('/tin-tuc/{article_category_key}.html', [
			'as' => 'article_category',
			'uses' => 'SiteControllers@article_category'
		]);	
	// ARTICLE
	Route::get('/tin/{article_id}/{article_key}.html', [
			'as' => 'article_detail',
			'uses' => 'SiteControllers@article_detail'
		]);
	
/***************************** end FOR ARTICLE  ******************************/


	//FOR LAYOUT 1
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

	Route::get('/googledfe457f9ba912579.html', function () {
	    return 'google-site-verification: googledfe457f9ba912579.html';
	});	
	Route::get('/sitemap.xml', function()
	{
		$file = public_path(). "/sitemap/sitemap.xml";  // <- Replace with the path to your .xml file
		// check if the file exists
		if (file_exists($file)) {
	    	// read the file into a string
	    	$content = file_get_contents($file);
	    	// create a Laravel Response using the content string, an http response code of 200(OK),
	    	//  and an array of html headers including the pdf content type
	    	return Response::make($content, 200, array('content-type'=>'application/xml'));
		}
	});
	Route::get('/sitemap.html', function()
	{
		$file = public_path(). "/sitemap/sitemap.html";  // <- Replace with the path to your .xml file
		// check if the file exists
		if (file_exists($file)) {
	    	return file_get_contents($file);; //file_get_contents(base_path().'\\public\\sitemap\\sitemap.html');
		}
	});
	//END FOR LAYOUT 1
});


////////////////////////////// EXTRA ROUTE //////////////////////////////

Route::group(['prefix' => 'extra','namespace' => 'Extra'], function()
{

	Route::get('/price_types', [
			'as' => 'extra.price_types',
			'uses' => 'ExtrasController@getPriceType'
	]);
	Route::get('/utilities', [
			'as' => 'extra.utilities',
			'uses' => 'ExtrasController@getUtilities'
	]);
	Route::get('/price_ranges', [
			'as' => 'extra.price_ranges',
			'uses' => 'ExtrasController@getPriceRange'
	]);	
	Route::get('/incense_types', [
			'as' => 'extra.incense_types',
			'uses' => 'ExtrasController@getIncenseType'
	]);
	Route::get('/area_ranges', [
			'as' => 'extra.area_ranges',
			'uses' => 'ExtrasController@getAreaRange'
	]);	


	Route::get('/product_types', [
			'as' => 'extra.product_types',
			'uses' => 'ExtrasController@getProductType'
	]);
	Route::get('/project_types', [
			'as' => 'extra.project_types',
			'uses' => 'ExtrasController@getProjectType'
	]);
	Route::get('/provinces', [
			'as' => 'extra.provinces',
			'uses' => 'ExtrasController@getProvinces'
	]);	
	Route::get('/districts-by-province/{province_id}', [
			'as' => 'extra.districtsByProvince',
			'uses' => 'ExtrasController@getDistrictsByProvince'
	]);	
	Route::get('/ward-by-district/{district_id}', [
			'as' => 'extra.wardsByDistrict',
			'uses' => 'ExtrasController@getWardsByDistrict'
	]);

	Route::get('/street-by-district/{district_id}', [
			'as' => 'extra.streetsByDistrict',
			'uses' => 'ExtrasController@getStreetsByDistrict'
	]);

	Route::get('/filter-project', [
			'as' => 'extra.filterProject',
			'uses' => 'ExtrasController@filterProject'
	]);
});
