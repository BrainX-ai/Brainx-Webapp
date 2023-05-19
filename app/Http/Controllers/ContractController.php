<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Action;
use App\Models\Job;
use App\Models\Message;
use App\Models\Milestone;
use Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        try {

            $contract = Contract::create([
                'contract_name' => $request->contract_name,
                'description' => $request->description,
                'contract_type' => $request->contract_type,
                'fixed_price' => $request->fixed_price,
                'service_fee' => $request->service_fee,
                'talent_receive' => $request->talent_receive,
                'job_id' => $request->job_id,
                'hourly_rate' => $request->hourly_rate,
                'hours_per_week' => $request->hours_per_week,
                'client_deposit' => $request->client_deposit,
                'duration' => $request->duration

            ]);
            $milestones = [];
            if ($request->contract_type == 'fixed') {
                // dd($request->milestone);
                foreach ($request->milestone as $index => $milestone) {
                    if ($milestone != null && $request->milestone_value[$index] != null) {
                        array_push($milestones, [
                            'caption' => $milestone,
                            'amount' => $request->milestone_value[$index],
                            'contract_id' => $contract->id
                        ]);
                    }
                }
            } else {
                for ($i = 0; $i < (int) $request->duration; $i++) {
                    array_push($milestones, [
                        'caption' => $i + 1,
                        'amount' => $request->client_deposit,
                        'contract_id' => $contract->id
                    ]);
                }
            }

            $milestone = Milestone::insert($milestones);
            $job = Job::find($request->job_id);
            $action = Action::create([
                'job_id' => $job->job_id,
                'sender_id' => Auth::user()->id,
                // sender id 0 means it is auto generated or sent by admin
                'action_type' => 'CONTRACT',
                'receiver_id' => $job->client_id
            ]);

            $message = Message::create([
                'action_id' => $action->id,
                'message' => 'Created a contract',
                'sender_id' => Auth::user()->id
            ]);

            return redirect()->route('talent.job.details', $request->job_id);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function endContract(Request $request)
    {
        $contract = Contract::where('id', $request->contract_id)->update([
            'status' => 'ENDED'
        ]);

        return redirect()->back();
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