<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\ProjectRequest;
use App\Models\Action;
use App\Models\Message;

class JobController extends Controller
{

    public function index(){

        $talents = User::where('role','Talent')->with('talent')->get();
        $jobs = Job::with('client')->with('talent')->get();

        
        return view('pages.admin.projects')->with('jobs', $jobs)->with('talents', $talents);
    }

    public function details($id){
        $job = Job::with(['project_requests','contract','talent'])->find($id);
      
        if($job){
            return view('pages.admin.project-details')->with('job', $job);
        }
    }
    
    public function assignTalent(Request $request){

        $job = Job::where('job_id', $request->job_id)->update([
            'talent_user_id' => $request->talent_id
        ]);
        
        $action = Action::create([
            'sender_id' => null,
            'job_id' =>$request->job_id,
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

        return redirect()->route("admin.projects");
        
    }
}
