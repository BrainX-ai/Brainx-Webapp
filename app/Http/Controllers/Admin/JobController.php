<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\ProjectRequest;
use App\Models\Action;
use App\Models\Message;
use App\Models\Transaction;
use Mail;
use Auth;
use App\Mail\SendMail;

class JobController extends Controller
{

    public function index()
    {

        $talents = User::where('role', 'Talent')->with('talent')->get();
        $jobs = Job::with('client')->with('talent')->get();


        return view('pages.admin.projects')->with('jobs', $jobs)->with('talents', $talents);
    }

    public function details($id)
    {
        $talents = User::where('role', 'Talent')->with('talent')->get();
        $job = Job::with(['project_requests', 'contract', 'talent'])->find($id);
        // dd($job);
        if ($job) {
            return view('pages.admin.project-details')->with('job', $job)->with('talents', $talents);
        }
    }

    public function updateTransactionStatus(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id)->update([
            'status' => $request->status
        ]);

        if ($request->status == 'DEPOSITED') {
            Milestone::where('id', $request->milestone_id)->update([
                'deposited' => true
            ]);

            $transaction = Transaction::with('job')->find($request->transaction_id);
            
            $action = Action::create([
                'job_id' => $transaction->job_id,
                'sender_id' => $transaction->job->client->id,
                'action_type' => 'ONLY_MESSAGE',
                'receiver_id' => $transaction->job->talent->id, // receiver 
            ]);

            $message = Message::create([
                'action_id' => $action->id,
                'message' => 'Deposited the contract',
                'sender_id' => $transaction->job->client->id
            ]);
        } else if ($request->status == 'APPROVED') {
            Milestone::where('id', $request->milestone_id)->update([
                'approved' => true
            ]);
        } else if ($request->status == 'RELEASED') {
            Milestone::where('id', $request->milestone_id)->update([
                'paid' => true
            ]);
        }

        return redirect()->back();
    }

    public function assignTalent(Request $request)
    {

        $job = Job::where('job_id', $request->job_id)->update([
            'talent_user_id' => $request->talent_id
        ]);

        $action = Action::create([
            'sender_id' => null,
            'job_id' => $request->job_id,
            'action_type' => 'MESSAGE_WITH_CLIENT_REQUEST',
            'receiver_id' => $request->talent_id
        ]);
        $message = Message::create([
            'sender_id' => null,
            'action_id' => $action->id,
            'message' => 'There is a client’s request that matches your profile. Please kindly review if you can take it. If you don’t reply within 24h, we may match this request to another talent. '
        ]);
        $jobRequest = ProjectRequest::create([
            'job_id' => $request->job_id,
            'user_id' => $request->talent_id,
            'action_id' => $action->id
        ]);
        $receiver = User::find($request->talent_id);
        try {
            $mailData = [
                'subject' => 'A request from BrainX’s client',
                'body' => 'There is a client’s request that matches your profile. Please kindly review if you can take it. If you don’t reply within 24h, we may match this request to another talent.
Thanks! ',
                'button_text' => 'View client request',
                'button_url' => 'https://brainx.biz/talent-care',
                'receiver' => $receiver->name,
                'preheadtext' => 'There is a client’s request that matches your profile'
            ];


            Mail::to($receiver->email)->send(new SendMail($mailData));
        } catch (\Exception $ex) {

        }

        return redirect()->back();

    }
}