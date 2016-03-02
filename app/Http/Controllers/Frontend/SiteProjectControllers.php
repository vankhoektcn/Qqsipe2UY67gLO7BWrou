<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ArticleCategory;
use App\ProjectCategory;
use App\Article;
use App\Contact;
use App\ArticleCategoryTranslation;
use App\Language;
use App\District;
use App\Subject;
use App\TeachTime;
use App\TutorRegister;
use App\StudentRegister;
use App\NewClass;
use App\Common;
use App\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use OpenGraph;
use Twitter;
use SEOMeta;
use Image;
use Mail;

use App\Province;
use App\Project;
use App\Project_part;
use App\Product_type;
use App\Product;
use App\Agent;

class SiteProjectcontrollers extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index1()
	{
		$this->setMetadata();
		return view('frontend.sites1.index1');
	}
	public function index()
	{
		$this->setMetadata();
		$provinces = Province::where('is_publish',1)->get();
		$projectCategory = new ProjectCategory;
		$projectsSpecal = $projectCategory->getProjectsByCategoryKey('du-an-noi-bat', 3);
		$projectsNew = $projectCategory->getProjectsByCategoryKey('du-an-moi-nhat', 3);
		$product_types = Product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get();
		$agents = Agent::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->take(4)->get();
		//$canHoChoThue = $product_type->getProductsByTypeKey('can-ho-sang-nhuong', 3);
		//$productAll = Product::where('active',1)->get();
		return view('frontend.sites1.index',[ 'provinces'=> $provinces,'projectsSpecal'=> $projectsSpecal, 'projectsNew'=> $projectsNew 
			, 'product_types'=> $product_types, 'agents'=> $agents ]);
	}

	public function article($categorykey, $articlekey)
	{
		$article = Article::where('key',$articlekey)->first();
		if($article != null){
			// metadata
			$site_title = $article->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($article->meta_description);
			SEOMeta::addKeyword([$article->meta_keywords]);
			SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
			if (isset($article->categories->first()->name)) {
				SEOMeta::addMeta('article:section', $article->categories->first()->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($article->meta_description);
			OpenGraph::setUrl(route('article', ['categorykey' => $categorykey, 'articlekey' => $articlekey]));
			OpenGraph::addProperty('type', 'article');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($article->getFirstAttachment());
			OpenGraph::addImage($article->attachments->lists('path'));
			OpenGraph::addImage(['url' => Image::url($article->getFirstAttachment(),300,300,array('crop')), 'size' => 300]);
			// end metadata

			return view('frontend.sites.article',compact('article'));
		}
		else
			return view('errors.404');
	}

	public function about()
	{
		return view('frontend.sites.about');
	}

	public function contact()
	{
		$this->setMetadata('Liên hệ');

		return view('frontend.sites.contact');
	}

	public function createContact(Request $request)
	{
		$json = json_decode('{"success":false, "message": "Đăng ký không thành công"}');
		//$arrayName = array('success' =>  false, 'message' => 'Đăng ký không thành công' );
		$validator = Validator::make($request->get('Contact'), Contact::$rules);
		if ($validator->fails())
		{
			if ($request->ajax()) {
				return response()->json($json);
			}
			else{
				return redirect()->back()->withErrors($validator->errors());
			}
		}
		else
		{
			$contact = new Contact;

			$contact->full_name = $request->input('Contact.full_name');
			$contact->email = $request->input('Contact.email');
			$contact->phone = $request->input('Contact.phone');
			$contact->subject = $request->input('Contact.subject');
			$contact->content = $request->input('Contact.content');
	 
			//Tiến hành lưu dữ liệu vào database
			$contact->save();

			// send email
			$common = new Common;
			$config = new Config;
			try{
				$common->sendEmail('frontend.emails.contact', $data = ['contact' => $contact], $to = $config->getValueByKey('address_received_mail'), $toName = $contact->full_name, $subject = $contact->subject, $cc = $contact->email, $replyTo = $contact->email);
			}catch(Exception $e){

			}
			if ($request->ajax()) {
				$json->success = true;
				$json->message = 'Chúng tôi sẽ chủ động cập nhật thông tin mới nhất đến bạn.';
				return response()->json($json);
			}
			else{
				return redirect(route('contact'))->with('contact-status', 'Nội dung liên hệ của quý khách đã được gửi đến ban quản trị. Chúng tôi sẽ phản hồi quý khách trong thời gian sớm nhất. Xin cảm ơn!');
			}
		}
	}

	public function search(Request $request)
	{
		$validator = Validator::make($request->all(), ['keyword' => 'required']);
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}
		else 
		{
			$this->setMetadata('Tìm kiếm');

			$name = $request->input('keyword');
			$limit = Config::findByKey('rows_per_page_article')->first()->value;
			$articles = Article::whereHas('translations', function ($query) use ($name) {
				$query->where('locale', app()->getLocale())->where('is_publish',1)->where('name','LIKE', '%'. $name .'%')->orderBy('priority')->orderBy('created_at','desc');
			})->paginate($limit);

			return view('frontend.sites.searchResult', ['articles'=> $articles]);
		}
	}
	
	public function tutor()
	{
		$this->setMetadata('Gia sư hiện có');

		return view('frontend.sites.tutor');
	}

	
	public function tutorRegister()
	{
		$this->setMetadata('Đăng ký làm gia sư');

		$districts = District::where('is_publish',1)->get();
		$subjects = Subject::where('is_publish',1)->orderBy('priority')->get();
		$teachTimes = TeachTime::where('is_publish',1)->orderBy('priority')->get();
		return view('frontend.sites.tutorRegister',['districts'=> $districts, 'subjects' => $subjects, 'teachTimes'=> $teachTimes]);
	}

	public function createTutorRegister(Request $request)
	{
		$validator = Validator::make($request->get('TutorRegister'), TutorRegister::$rules);
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}
		else
		{
			$strSubjects = $request->input('arrSubjects');
			$strTeachTime = $request->input('arrTeachTime');
			$strDistrict = $request->input('arrDistrict');
			if(empty($strSubjects) || empty($strTeachTime) || empty($strDistrict))
			{
				return redirect()->back()->withErrors("Môn học, thời gian dạy, nơi dạy vui lòng nhập đầy đủ.");
			}
			$arrSubjects = preg_split('/(,{1}[\s]?|\sand\s)+/', $strSubjects);

			$arrTeachTime = preg_split('/(,{1}[\s]?|\sand\s)+/', $strTeachTime);

			$arrDistrict = preg_split('/(,{1}[\s]?|\sand\s)+/', $strDistrict);

			$tutorRegister = new TutorRegister;
			$tutorRegister->name = $request->input('TutorRegister.name');
			$tutorRegister->email = $request->input('TutorRegister.email');
			$tutorRegister->mobile = $request->input('TutorRegister.mobile');
			$tutorRegister->sex = $request->input('TutorRegister.sex');
			$tutorRegister->district_id = $request->input('TutorRegister.district_id');
			$tutorRegister->address = $request->input('TutorRegister.address');
			$tutorRegister->teacher_level = $request->input('TutorRegister.teacher_level');
			$tutorRegister->experient = $request->input('TutorRegister.experient');
			$tutorRegister->company = $request->input('TutorRegister.company');
			$tutorRegister->primary = $request->input('TutorRegister.primary');
			$tutorRegister->secondary = $request->input('TutorRegister.secondary');
			$tutorRegister->highshool = $request->input('TutorRegister.highshool');
			$tutorRegister->salary = $request->input('TutorRegister.salary');
			$tutorRegister->other_require = $request->input('TutorRegister.other_require');

			$tutorRegister->save();

			$tutorRegister->subjects()->sync($arrSubjects);
			$tutorRegister->teachTimes()->sync($arrTeachTime);
			$tutorRegister->districts()->sync($arrDistrict);
			return redirect(route('tutorRegister'))->with('register-status', 'Đăng ký làm gia sư thành công. Chúng tôi sẽ phản hồi quý khách trong thời gian sớm nhất. Xin cảm ơn!');
		}
	}

	public function studentRegister()
	{
		$this->setMetadata('Đăng ký tìm gia sư');

		$districts = District::where('is_publish',1)->get();
		$subjects = Subject::where('is_publish',1)->orderBy('priority')->get();
		$teachTimes = TeachTime::where('is_publish',1)->orderBy('priority')->get();
		return view('frontend.sites.studentRegister',['districts'=> $districts, 'subjects' => $subjects, 'teachTimes'=> $teachTimes]);
	}

	public function createStudentRegister(Request $request)
	{
		$validator = Validator::make($request->get('StudentRegister'), StudentRegister::$rules);
		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors());
		}
		else
		{
			$arrSubjects = $request->input('StudentRegister.subjects');// $request->input('arrSubjects');
			$arrTeachTime = $request->input('StudentRegister.teachTimes');// $request->input('arrTeachTime');
			if(empty($arrSubjects) || empty($arrTeachTime))
			{
				return redirect()->back()->withErrors("vui lòng chọn môn học, thời gian học.");
			}

			$studentRegister = new StudentRegister;
			$studentRegister->name = $request->input('StudentRegister.name');
			$studentRegister->email = $request->input('StudentRegister.email');
			$studentRegister->mobile = $request->input('StudentRegister.mobile');
			$studentRegister->sex = $request->input('StudentRegister.sex');
			$studentRegister->district_id = $request->input('StudentRegister.district_id');
			$studentRegister->address = $request->input('StudentRegister.address');
			$studentRegister->class = $request->input('StudentRegister.class');
			$studentRegister->level = $request->input('StudentRegister.level');
			$studentRegister->school = $request->input('StudentRegister.company');
			$studentRegister->cost = $request->input('StudentRegister.cost');
			$studentRegister->other_require = $request->input('StudentRegister.other_require');

			$studentRegister->save();

			$studentRegister->subjects()->sync($arrSubjects);
			$studentRegister->teachTimes()->sync($arrTeachTime);
			return redirect(route('studentRegister'))->with('register-status', 'Đăng ký tìm gia sư thành công. Chúng tôi sẽ phản hồi quý khách trong thời gian sớm nhất. Xin cảm ơn!');
		}
	}

	
	public function newClass()
	{
		$this->setMetadata('Lớp mới');

		$limit = Config::findByKey('rows_per_page_article')->first()->value;
		$newclass = NewClass::where('is_publish',1)->orderBy('priority')->paginate($limit);	
		return view('frontend.sites.newClass', ['newclass' => $newclass]);
	}

	public function searchNewClass(Request $request)
	{
		$this->setMetadata('Lớp mới');

		$status = $request->input('status');
		$newclass = null;

		$limit = Config::findByKey('rows_per_page_article')->first()->value;

		if(is_null($status) || $status == "")
			$newclass = NewClass::where('is_publish',1)->orderBy('priority')->paginate($limit);
		else
			$newclass = NewClass::where('is_publish',1)->where('status',$status)->orderBy('priority')->paginate($limit);
		return view('frontend.sites.newClass', ['newclass' => $newclass]);
	}

	/**
	 * setMetadata for common pages
	 */
	private function setMetadata($prefix = '')
	{
		// metadata
		$site_title = Config::findByKey('site_title')->first()->value;
		if ($prefix != '') {
			$site_title = $prefix . ' - ' . $site_title;
		}
		$meta_description = Config::findByKey('meta_description')->first()->value;
		$meta_keywords = Config::findByKey('meta_keywords')->first()->value;
		SEOMeta::setTitle($site_title);
		SEOMeta::setDescription($meta_description);
		SEOMeta::addKeyword([$meta_keywords]);

		OpenGraph::setTitle($site_title);
		OpenGraph::setDescription($meta_description);
		OpenGraph::setUrl(route('homepage'));
		OpenGraph::addProperty('type', 'articles');
		// end metadata
	}


	//FOR PROJECTS

	public function project($districtkey,$projectkey)
	{
		$project = Project::where('key',$projectkey)->first();
		if($project != null){
			$project_parts = $project->project_parts()->where('active',1)->where('type','E')->orderBy('priority')->get();
			$project_articles = $project->project_parts()->where('active',1)->where('type','A')->orderBy('priority')->get();
			$project_images = $project->project_images()->where('active',1)->where('path', '<>',$project->logo)->orderBy('priority')->take(5)->get();
			$other_projects = Project::where('active',1)->orderBy('priority')->take(5)->get();
			$project_agents = $project->agents()->get();

			// metadata
			$site_title = $project->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($project->meta_description);
			SEOMeta::addKeyword([$project->meta_keywords]);
			SEOMeta::addMeta('project:published_time', $project->created_at->toW3CString(), 'property');
			if (isset($project->district->name)) {
				SEOMeta::addMeta('project:section', $project->district->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($project->meta_description);
			OpenGraph::setUrl( $project->getLink());
			OpenGraph::addProperty('type', 'project');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($project->logo);
			OpenGraph::addImage($project_images->lists('path'));
			OpenGraph::addImage(['url' => Image::url($project->logo,300,300,array('crop')), 'size' => 300]);
			// end metadata
			return view('frontend.sites.project',compact('project', 'project_parts','project_articles','project_images','other_projects','project_agents'));
		}
		else
			return view('errors.404');
	}
	public function project_part($districtkey, $projectkey, $projectpartid ,$projectpartkey)
	{
		$project_part = Project_part::findOrFail($projectpartid);
		if($project_part != null){
			$project = $project_part->project;
			$project_parts = $project->project_parts()->where('active',1)->where('type','E')->orderBy('priority')->get();
			$project_articles = $project->project_parts()->where('active',1)->where('type','A')->orderBy('priority')->get();
			$project_images = $project->project_images()->where('active',1)->where('path', '<>',$project->logo)->orderBy('priority')->take(5)->get();
			$other_projects = Project::where('active',1)->orderBy('priority')->take(5)->get();
			$project_agents = $project->agents()->get();

			// metadata
			$site_title = $project->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($project->meta_description);
			SEOMeta::addKeyword([$project->meta_keywords]);
			SEOMeta::addMeta('project:published_time', $project->created_at->toW3CString(), 'property');
			if (isset($project->district->name)) {
				SEOMeta::addMeta('project:section', $project->district->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($project->meta_description);
			OpenGraph::setUrl( $project->getLink());
			OpenGraph::addProperty('type', 'project');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($project->logo);
			OpenGraph::addImage($project_images->lists('path'));
			OpenGraph::addImage(['url' => Image::url($project->logo,300,300,array('crop')), 'size' => 300]);
			// end metadata
			return view('frontend.sites.project_part',compact('project', 'project_parts', 'project_part','project_articles','project_images','other_projects','project_agents'));
		}
		else
			return view('errors.404');
	}


	// FOR PRODUCT
	public function product($districtkey,$productkey)
	{
		$product = Product::where('key',$productkey)->first();
		if($product != null){
			$other_products = Product::where('active',1)->orderBy('priority')->take(5)->get();

			// metadata
			$site_title = $product->name . ' - ' . Config::findByKey('site_title')->first()->value;
			SEOMeta::setTitle($site_title);
			SEOMeta::setDescription($product->meta_description);
			SEOMeta::addKeyword([$product->meta_keywords]);
			SEOMeta::addMeta('product:published_time', $product->created_at->toW3CString(), 'property');
			if (isset($product->product_type->name)) {
				SEOMeta::addMeta('product:section', $product->product_type->name, 'property');
			}

			OpenGraph::setTitle($site_title);
			OpenGraph::setDescription($product->meta_description);
			OpenGraph::setUrl($product->getLink());
			OpenGraph::addProperty('type', 'product');
			OpenGraph::addProperty('locale', app()->getLocale());
			OpenGraph::addProperty('locale:alternate', ['vi-vn', 'en-us']);

			OpenGraph::addImage($product->getThumnail());
			OpenGraph::addImage($product->attachments->lists('path'));
			OpenGraph::addImage(['url' => Image::url($product->getThumnail(),300,300,array('crop')), 'size' => 300]);
			// end metadata
			return view('frontend.sites.product',compact('product'));
		}
		else
			return view('errors.404');
	}

	public function product_type($producttypekey)
	{
		return redirect()->route('homepage');
	}
}
