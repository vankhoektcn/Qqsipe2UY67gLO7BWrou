<?php

namespace App\Http\Controllers\Admin\Others;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\NewClass;
use App\Subject;
use App\Language;
use DB;
use App\Common;
use Auth;

class newclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newclass = NewClass::orderBy('priority')->get();
        if ($request->ajax()) {
            return $newclass->toArray();
        }
        return view('admin.newclass.index', ['newclass' => $newclass]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newclass.create');
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
        $validateClass = Validator::make($request->get('NewClass'), NewClass::$rules);
        $validationMessages = [];

        if ($validateClass->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateClass->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request) {
            $user = $request->user();

            // insert Class
            $class = new NewClass;
            $class->code = $request->input('NewClass.code');
            $class->name = $request->input('NewClass.name');
            $class->for_class = $request->input('NewClass.for_class');
            $class->subject_id = $request->input('NewClass.subject_id');
            $class->address = $request->input('NewClass.address');
            $class->salary = $request->input('NewClass.salary');
            $class->time = $request->input('NewClass.time');
            $class->day_number = $request->input('NewClass.day_number');
            $class->required = $request->input('NewClass.required');
            $class->contactinfo = $request->input('NewClass.contactinfo');
            $class->status = $request->input('NewClass.status');

            $class->priority = $request->input('NewClass.priority');
            $class->is_publish = $request->input('NewClass.is_publish');
            $class->created_by = $user->name;
            $class->updated_by = $user->name;
            $class->save();

        });

        return redirect()->route('admin.newclass.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $newclass = NewClass::findOrFail($id)->toArray();
        $subjects = Subject::where('is_publish',1)->orderBy('priority')->get()->toArray();
        return ['newclass' => $newclass, 'subjects' => $subjects];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newclass = NewClass::findOrFail($id);
        return view('admin.newclass.edit', ['newclass' => $newclass]);
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
        $validateClass = Validator::make($request->get('NewClass'), NewClass::$rules);
        $validationMessages = [];

        if ($validateClass->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateClass->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $id) {
            $user = $request->user();

            // insert Class
            $class = NewClass::findOrFail($id);
            $class->code = $request->input('NewClass.code');
            $class->name = $request->input('NewClass.name');
            $class->for_class = $request->input('NewClass.for_class');
            $class->subject_id = $request->input('NewClass.subject_id');
            $class->address = $request->input('NewClass.address');
            $class->salary = $request->input('NewClass.salary');
            $class->time = $request->input('NewClass.time');
            $class->day_number = $request->input('NewClass.day_number');
            $class->required = $request->input('NewClass.required');
            $class->contactinfo = $request->input('NewClass.contactinfo');
            $class->status = $request->input('NewClass.status');

            $class->priority = $request->input('Class.priority');
            $class->is_publish = $request->input('Class.is_publish');
            $class->created_by = $user->name;
            $class->updated_by = $user->name;
            $class->save();

        });

        return redirect()->route('admin.newclass.index');

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
            $class = NewClass::findOrFail($id);
            $class->updated_by = $user->name;
            $class->deleted_by = $user->name;
            $class->save();

            // soft delete
            $class->delete();
        });
    }
}
