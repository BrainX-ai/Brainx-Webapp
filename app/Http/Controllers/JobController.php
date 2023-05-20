<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Action;
use App\Models\Milestone;
use App\Models\ProjectRequest;
use App\Models\Message;
use App\Models\User;
use Auth;
use Mail;
use App\Mail\SendMail;

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
        $jobs = Job::where('talent_user_id', Auth::guard()->user()->id)->with(['contract', 'talent', 'client', 'actions'])->orderBy('job_id', 'DESC')->get();

        if (sizeof($jobs)) {
            $job = $jobs[0];
            $actions = Action::where('job_id', $job->job_id)->with('message')->with('sender')->with('file')->get();
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

        // $milestones = Milestone::where('contract_id', $job->contract->id)->get();
        $actions = Action::where('job_id', $job->job_id)->with('message')->with('sender')->with('file')->get();
        // dd($actions);
        return view('pages.talent.job-details')->with('job', $job)->with('jobs', $jobs)->with('actions', $actions);
    }

    public function acceptRequest(Request $request)
    {

        $projectRequest = ProjectRequest::where('job_id', $request->job_id)->where('user_id', Auth::user()->id)->update([
            'status' => 'ACCEPTED',
            'message' => $request->message
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

        $receiver = User::find($action->receiver_id);
        try {
            $mailData = [
                'subject' => 'BrainX’s found an AI talent for you',
                'body' => 'We have found an AI talent that is suitable to your request. Go to the conversation and view the talent’s profile.',
                'button_text' => 'Go',
                'button_url' => route('client.job.details', $request->job_id),
                'receiver' => $receiver->name,
                'preheadtext' => 'We have found an AI talent that is suitable to your request'
            ];

            Mail::to($receiver->email)->send(new SendMail($mailData));

        } catch (\Exception $ex) {

        }
        return redirect()->route('talent.job.details', $request->job_id);
    }

    public function rejectRequest(Request $request)
    {

        $projectRequest = ProjectRequest::where('job_id', $request->job_id)->where('user_id', Auth::user()->id)->update([
            'status' => 'REJECTED',
            'message' => $request->message
        ]);

        $job = Job::where('job_id', $request->job_id)->update([
            'talent_user_id' => null
        ]);

        try {
            $job = Job::find($request->job_id);
            $mailData = [
                'subject' => 'Project request rejected',
                'body' => Auth::user()->name . ' rejected the job request with the following title: "' . $job->job_title . '"',
                'button_text' => 'Open',
                'button_url' => route('admin.projects'),
                'receiver' => 'BrainX Admin',
                'preheadtext' => Auth::user()->name . ' rejected job request'
            ];

            Mail::to('support@brainx.biz')->send(new SendMail($mailData));
        } catch (\Exception $ex) {

        }

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