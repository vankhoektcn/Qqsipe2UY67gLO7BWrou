<?php

namespace App\Http\Controllers\Admin\Others;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Subject;
use App\SubjectTranslation;
use App\Language;
use DB;
use App\Common;
use Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::all();
        if ($request->ajax()) {
            return $subjects->toArray();
        }
        return view('admin.subjects.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subjects.create');
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
        $validateSubject = Validator::make($request->get('Subject'), Subject::$rules);
        $validationMessages = [];

        foreach ($request->get('SubjectTranslation') as $key => $value) {
            $validateSubjectTranslation = Validator::make($value, SubjectTranslation::$rules);
            if ($validateSubjectTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateSubjectTranslation->messages()->toArray());
            }
        }

        if ($validateSubject->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateSubject->messages()->toArray(), $validationMessages);
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

            // insert Subject
            $subject = new Subject;
            $subject->key = Common::createKeyURL($request->input('SubjectTranslation.'.$languageDefault->code.'.name'));
            $subject->priority = $request->input('Subject.priority');
            $subject->is_publish = $request->input('Subject.is_publish');
            $subject->created_by = $user->name;
            $subject->updated_by = $user->name;
            $subject->save();


            // save data languages
            foreach ($request->get('SubjectTranslation') as $locale => $value) {
                $subject->translateOrNew($locale)->name = $request->input('SubjectTranslation.' .$locale. '.name');
            }

            $subject->save();

        });

        return redirect()->route('admin.subjects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Subject::with('translations')->findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', ['subject' => $subject]);
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
        $validateSubject = Validator::make($request->get('Subject'), Subject::$rules);
        $validationMessages = [];

        foreach ($request->get('SubjectTranslation') as $key => $value) {
            $validateSubjectTranslation = Validator::make($value, SubjectTranslation::$rules);
            if ($validateSubjectTranslation->fails()){
                $validationMessages = array_merge_recursive($validationMessages, $validateSubjectTranslation->messages()->toArray());
            }
        }

        if ($validateSubject->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateSubject->messages()->toArray(), $validationMessages);
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

            // insert Subject
            $subject = Subject::findOrFail($id);
            $subject->key = Common::createKeyURL($request->input('SubjectTranslation.'.$languageDefault->code.'.name'));
            $subject->priority = $request->input('Subject.priority');
            $subject->is_publish = $request->input('Subject.is_publish');
            $subject->created_by = $user->name;
            $subject->updated_by = $user->name;
            $subject->save();


            // save data languages
            foreach ($request->get('SubjectTranslation') as $locale => $value) {
                $subject->translateOrNew($locale)->name = $request->input('SubjectTranslation.' .$locale. '.name');
            }

            $subject->save();

        });

        return redirect()->route('admin.subjects.index');

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
            $subject = Subject::findOrFail($id);
            $subject->updated_by = $user->name;
            $subject->deleted_by = $user->name;
            $subject->key = $subject->key.'-'.microtime(true);
            $subject->save();

            // soft delete
            $subject->delete();
        });
    }
}
