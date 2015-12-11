<?php

namespace App\Http\Controllers\Admin\Others;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\TeachTime;
use App\Language;
use DB;
use App\Common;
use Auth;

class TeachTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachTimes = TeachTime::orderBy('type')->orderBy('priority')->get();
        if ($request->ajax()) {
            return $teachTimes->toArray();
        }
        return view('admin.teachtimes.index', ['teachtimes' => $teachTimes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachtimes.create');
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
        $validateTeachTime = Validator::make($request->get('TeachTime'), TeachTime::$rules);
        $validationMessages = [];

        if ($validateTeachTime->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateTeachTime->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request) {
            $user = $request->user();

            // insert TeachTime
            $teachTime = new TeachTime;
            $teachTime->key = $request->input('TeachTime.key');
            $teachTime->type = $request->input('TeachTime.type');
            $teachTime->priority = $request->input('TeachTime.priority');
            $teachTime->is_publish = $request->input('TeachTime.is_publish');
            $teachTime->created_by = $user->name;
            $teachTime->updated_by = $user->name;
            $teachTime->save();


            $teachTime->save();

        });

        return redirect()->route('admin.teachtimes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TeachTime::findOrFail($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachTime = TeachTime::findOrFail($id);
        return view('admin.teachtimes.edit', ['teachtime' => $teachTime]);
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
        $validateTeachTime = Validator::make($request->get('TeachTime'), TeachTime::$rules);
        $validationMessages = [];

        if ($validateTeachTime->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateTeachTime->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        // sure execute success, if not success rollback
        DB::transaction(function () use ($request, $id) {
            $user = $request->user();

            // insert TeachTime
            $teachTime = TeachTime::findOrFail($id);
            $teachTime->key = $request->input('TeachTime.key');
            $teachTime->type = $request->input('TeachTime.type');
            $teachTime->priority = $request->input('TeachTime.priority');
            $teachTime->is_publish = $request->input('TeachTime.is_publish');
            $teachTime->created_by = $user->name;
            $teachTime->updated_by = $user->name;
            $teachTime->save();

            $teachTime->save();

        });

        return redirect()->route('admin.teachtimes.index');

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
            $teachTime = TeachTime::findOrFail($id);
            $teachTime->updated_by = $user->name;
            $teachTime->deleted_by = $user->name;
            $teachTime->save();

            // soft delete
            $teachTime->delete();
        });
    }
}
