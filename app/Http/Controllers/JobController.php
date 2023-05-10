<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Action;
use App\Models\Milestone;
use App\Models\ProjectRequest;
use App\Models\Message;
use Auth;

class JobController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
        $this->checkRole('Talent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function talentCare()
    {
        $jobs = Job::where('talent_user_id', Auth::user()->id)->with('isAccepted')->get();

        $actions = Action::where('sender_id', null)->where('receiver_id', Auth::user()->id)->with(['message', 'job', 'projectRequest'])->get();
        // dd($jobs);
        return view('pages.talent.talent-care')->with('actions', $actions)->with('jobs', $jobs);
    }

    public function jobDetail()
    {
        $jobs = Job::where('talent_user_id', Auth::guard()->user()->id)->with('contract')->orderBy('job_id', 'DESC')->get();

        if (sizeof($jobs)) {
            $job = $jobs[0];
            $actions = Action::where('job_id', $job->job_id)->with('message')->with('sender')->get();
            // dd($actions);
            // dd($job);
            return view('pages.talent.job-details')->with('job', $job)->with('jobs', $jobs)->with('actions', $actions);
        }

        return redirect()->route('talent.pending');
    }

    public function jobDetails($id)
    {
        $jobs = Job::where('talent_user_id', Auth::guard()->user()->id)->with(['contract', 'talent', 'client', 'actions'])->orderBy('job_id', 'DESC')->get();

        if ($id != null) {
            $job = Job::with(['contract', 'talent', 'client', 'actions'])->find($id);
        } else {
            $job = $jobs[0];
        }

        $milestones = Milestone::where('contract_id', $job->contract->id)->get();
        $actions = Action::where('job_id', $job->job_id)->with('message')->with('sender')->get();
        // dd($job->talent['talent']->photo);
        return view('pages.talent.job-details')->with('job', $job)->with('jobs', $jobs)->with('actions', $actions)->with('milestones', $milestones);
    }

    public function acceptRequest(Request $request)
    {

        $projectRequest = ProjectRequest::where('job_id', $request->job_id)->where('user_id', Auth::user()->id)->update([
            'status' => 'ACCEPTED'
        ]);

        $action = Action::create([
            'job_id' => $request->job_id,
            'sender_id' => Auth::user()->id,
            'receiver_id' => Job::find($request->job_id)->client_id,
            'action_type' => 'ACCEPTENCE_MESSAGE'
        ]);
        $message = Message::create([
            'sender_id' => Auth::user()->id,
            'action_id' => $action->id,
            'message' => $request->message
        ]);

        return redirect()->route('talent.job.details', $request->job_id);
    }

    public function rejectRequest(Request $request)
    {

        $projectRequest = ProjectRequest::where('job_id', $request->job_id)->where('user_id', Auth::user()->id)->update([
            'status' => 'REJECTED'
        ]);
        $job = Job::where('job_id', $request->job_id)->update([
            'talent_user_id' => null
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}