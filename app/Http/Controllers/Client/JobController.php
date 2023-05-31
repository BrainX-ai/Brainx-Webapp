<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Message;
use App\Models\Action;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Milestone;
use App\Models\Contract;
use Auth;
use Mail;
use App\Mail\SendMail;

class JobController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->checkRole('Client');
    }
    
    public function jobsPage(){
        
        return view('pages.client.pages.dashboard');
    }

    public function create(){
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->orderBy('job_id','DESC')->get();
        return view('pages.client.pages.post-new-request')->with('jobs', $jobs);
    }

    public function jobDetails($id){
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->with(['contract','latest_project_request'])->orderBy('job_id','DESC')->get();
        if($id != null){
            $job = Job::with(['contract','latest_project_request','actions'])->find($id);
            if($job == null){
                abort(404);
            }
        }else if(sizeof($jobs)){
            $job = $jobs[0];
        }else{
            return redirect()->route('client.job.new');
        }
        // dd(sizeof($job->contract->milestones[0]->transactions));
        $actions = Action::where('job_id', $job->job_id)->with('message')->with('sender')->with('job')->get();
        
        return view('pages.client.pages.job-details')->with('job', $job)->with('jobs', $jobs)->with('actions', $actions);
    }

    public function jobDetail(){
        
        $jobs = Job::where('client_id', Auth::guard()->user()->id)->with(['contract','latest_project_request'])->orderBy('job_id','DESC')->get();
        if(sizeof($jobs)){
            $actions = Action::where('job_id', $jobs[0]->job_id)->with('message')->with('sender')->get();
            // dd($actions);
        }else{
            return redirect()->route('client.job.new');
        }
        // dd($jobs[0]);
        return view('pages.client.pages.job-details')->with('job', $jobs[0])->with('jobs', $jobs)->with('actions', $actions);
    }

    public function store(Request $request){

        $job = Job::create([
            'job_title' => $request->job_title,
            'job_description' => ($request->job_type == 'Hire remote AI contractor')? $request->job_description:$request->job_description_outsource,
            'job_type' => $request->job_type,
            'duration_in_weeks' => $request->duration_in_weeks,
            'hours_per_week' => $request->hours_per_week,
            'budget' => $request->budget,
            'hourly_rate_from' => $request->hourly_rate_from,
            'hourly_rate_to' => $request->hourly_rate_to,
            'client_id' => Auth::guard()->user()->id,
        ]);

        $action = Action::create([
            'job_id' => $job->job_id,
            'sender_id' => NULL, // sender id 0 means it is auto generated or sent by admin
            'action_type' => 'MESSAGE_WITH_MY_REQUEST',
            'receiver_id' => Auth::guard()->user()->id, // receiver 
        ]);

        $message = Message::create([
            'action_id' => $action->id,
            'message' => 'Our AI expert will review your request and match you to a suitable AI talent. You will be notified via email when we find one for you. Thank for your request!
                  ',
            'sender_id' => NULL
        ]);

        try{
        $mailData = [
            'subject' => 'New Project Request',
            'body' => 'A new project request is created with the following title: "'.$job->job_title.'" <br/> Created by: '.Auth::guard()->user()->name,
            'button_text' => 'Open',
            'button_url' => 'https://admin.brainx.biz/project/details/'.$job->job_id,
            'receiver' => 'BrainX Admin',
            'preheadtext' => 'A new project request is created.'
        ];
        
        Mail::to('talent@brainx.biz')->send(new SendMail($mailData));
        }catch(\Exception $ex){
            dd($ex->getMessage());
        }

        return redirect()->route('client.job.details',['id' => $job->job_id]);

    }

    public function requestInvoice(Request $request){

        $transaction = Transaction::create([
            'job_id' => $request->job_id,
            'milestone_id' => $request->milestone_id,
            'status' => $request->status
        ]);

        if($request->status == 'DEPOSITED' ){
            Milestone::where('id',$request->milestone_id)->update([
                'deposited' => true
            ]);
        }else if($request->status == 'APPROVED') {
            Milestone::where('id',$request->milestone_id)->update([
                'approved' => true
            ]);
        }else if($request->status == 'RELEASED') {
            Milestone::where('id',$request->milestone_id)->update([
                'paid' => true
            ]);
        }

        $contract = Contract::where('job_id',$request->job_id)->increment('milestone_counter');

        try{
            $mailData = [
                'subject' => 'Invoice Request from Client',
                'body' => 'You got an invoice request from the client. Click the button to navigate to the project details.',
                'button_text' => 'Open',
                'button_url' => 'https://admin.brainx.biz/project/details/'.$request->job_id,
                'receiver' => 'BrainX Admin',
                'preheadtext' => 'A new invoice request has been created'
            ];
            
            Mail::to('finance@brainx.biz')->send(new SendMail($mailData));
            }catch(\Exception $ex){
                
            }


        return redirect()->route('client.job.details', ['id' => $request->job_id]);
    }

    public function approveDeposit(Request $request){
        $transaction = Transaction::create([
            'job_id' => $request->job_id,
            'milestone_id' => $request->milestone_id,
            'status' => $request->status
        ]);

        if($request->status == 'DEPOSITED' || $request->status == 'CREATED_INVOICE' || $request->status == 'INVOICE_REQUESTED'){
            Milestone::where('id',$request->milestone_id)->update([
                'deposited' => true
            ]);
        }else if($request->status == 'APPROVED') {
            Milestone::where('id',$request->milestone_id)->update([
                'approved' => true
            ]);
        }else if($request->status == 'RELEASED') {
            Milestone::where('id',$request->milestone_id)->update([
                'paid' => true
            ]);
        }

        $contract = Contract::where('job_id',$request->job_id)->increment('milestone_counter');

        try{
            $mailData = [
                'subject' => 'Client APPROVED a payment',
                'body' => 'CLient approved a payment of a milestone. Please release the money to the talenta account',
                'button_text' => 'Open',
                'button_url' => 'https://admin.brainx.biz/project/details/'.$request->job_id,
                'receiver' => 'BrainX Admin',
                'preheadtext' => 'Please the payment to the talenta account'
            ];
            
            Mail::to('finance@brainx.biz')->send(new SendMail($mailData));
            }catch(\Exception $ex){
                
            }

        return redirect()->route('client.job.details', ['id' => $request->job_id]);
    }

    public function showTalentProfile($id)
    {   
        $id = decrypt($id);
        
        $user = User::with('talent')->with('experiences')->with('educations')->find($id);

        return view('pages.client.pages.talent-profile')->with('user', $user);
    }

}
