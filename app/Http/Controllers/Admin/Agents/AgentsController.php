<?php

namespace App\Http\Controllers\Admin\Agents;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Agent;
use DB;
use App\Common;
use Auth;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agents = Agent::all();
        if ($request->ajax()) {
            return $agents->toArray();
        }
        return view('admin.agents.index', ['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agents.create');
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
        $validateAgent = Validator::make($request->get('Agent'), Agent::$rules);
        $validationMessages = [];

        if ($validateAgent->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateAgent->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        $user = $request->user();
        // insert Agent
        $agent = new Agent;
        //$agent->key = Common::createKeyURL($request->input('Agent.name'));
        $agent->name = $request->input('Agent.name');
        $agent->email = $request->input('Agent.email');
        $agent->mobile = $request->input('Agent.mobile');
        $agent->thumnail = $request->input('Agent.thumnail');
        $agent->priority = $request->input('Agent.priority');
        $agent->active = $request->input('Agent.active');
        $agent->created_by = $user->name;
        $agent->updated_by = $user->name;
        $agent->save();

        // save attachments
        if ($request->input('Agent.attachments') != "") {
            $requestAttachments = explode(',', $request->input('Agent.attachments'));
            $attachments = [];
            foreach ($requestAttachments as $key => $value) {
                array_push($attachments, new Attachment([
                    'entry_id' => $agent->id,
                    'table_name' => 'agents',
                    'path' => $value,
                    'priority' => 0,
                    'is_publish' => 1
                    ]));
            }
            if (count($attachments) > 0) {
                $agent->attachments()->saveMany($attachments);
            }
        }

        return redirect()->route('admin.agents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Agent::with('attachments')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        //dd($agent);
        return view('admin.agents.edit', ['agent' => $agent]);
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
        $validateAgent = Validator::make($request->get('Agent'), Agent::$rules);
        $validationMessages = [];

        if ($validateAgent->fails() OR count($validationMessages) > 0) {
            $validationMessages = array_merge_recursive($validateAgent->messages()->toArray(), $validationMessages);
            return redirect()->back()->withErrors($validationMessages)->withInput();
        }

        $user = $request->user();
        // insert Agent
        $agent = Agent::findOrFail($id);
        //$agent->key = Common::createKeyURL($request->input('Agent.name'));
        $agent->name = $request->input('Agent.name');
        $agent->email = $request->input('Agent.email');
        $agent->mobile = $request->input('Agent.mobile');
        $agent->thumnail = $request->input('Agent.thumnail');
        $agent->priority = $request->input('Agent.priority');
        $agent->active = $request->input('Agent.active');
        $agent->created_by = $user->name;
        $agent->updated_by = $user->name;
        $agent->save();


        // save attachments
        // only insert or delete, not update
        if ($request->input('Agent.attachments') != "") {
            $currentAttachments = $agent->attachments->lists('id');
            $requestAttachments = explode(',', $request->input('Agent.attachments'));
            $attachments = [];
            $keepAttachments = [];
            foreach ($requestAttachments as $key => $value) {
                if (strpos($value, '|') === false) {
                    array_push($attachments, new Attachment([
                        'entry_id' => $agent->id,
                        'table_name' => 'agents',
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
                $agent->attachments()->saveMany($attachments);
            }
            // delete attachments
            foreach ($currentAttachments as $key => $value) {
                if (!in_array($value, $keepAttachments)) {
                    Attachment::findOrFail($value)->delete();
                }
            }
        }
        return redirect()->route('admin.agents.index');

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
            $agent = Agent::findOrFail($id);
            $agent->updated_by = $user->name;
            $agent->deleted_by = $user->name;
            $agent->key = $agent->key.'-'.microtime(true);
            $agent->save();

            // soft delete
            $agent->delete();
        });
    }
}
