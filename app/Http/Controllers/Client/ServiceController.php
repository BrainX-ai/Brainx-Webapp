<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Service;
use App\Models\ServiceTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (!Auth::check()) {
            session(['service_id' => $id]);
        }

        $service = Service::with('talent')->find($id);
        $talent = User::with('talent')->find($service->user_id);

        return view('pages.client.pages.service-details')->with('service', $service)->with('talent', $talent);
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

    public function messages($service_id)
    {

        $client_id = Auth::user()->id;
        $serviceTransaction = ServiceTransaction::where('client_id', $client_id)->where('service_id', $service_id)->with('service')->first();
        if ($serviceTransaction == null) {
            $serviceTransaction = $this->createServiceTransaction($service_id);
        }
        $actions = Action::where('service_transaction_id', $serviceTransaction->id)->get();

        $service = Service::find($service_id);
        $serviceTransactions = ServiceTransaction::where('client_id', $client_id)->get();

        return view('pages.client.pages.service-chat-page', compact('actions', 'serviceTransaction', 'serviceTransactions', 'service'));
    }

    public function messagesAll()
    {
        $actions = [];
        $service = null;

        $client_id = Auth::user()->id;
        $serviceTransactions = ServiceTransaction::where('client_id', $client_id)->with('service')->get();

        if (sizeof($serviceTransactions) > 0) {
            return redirect()->route('client.messages', ['service_id' => $serviceTransactions[0]->service_id]);
        }


        return view('pages.client.includes.no-service-chat');
    }

    public function createServiceTransaction($service_id)
    {
        return ServiceTransaction::create([
            'service_id' => $service_id,
            'client_id' => Auth::user()->id,
            'user_id' => Service::find($service_id)->user_id
        ]);
    }
}
