<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Message;
use App\Models\Service;
use App\Models\ServiceTransaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PayPalController extends Controller
{
    private $provider;

    public function createTransaction()
    {
        return view('transaction');
    }

    public function getAmount($service_id)
    {
        $id = decrypt($service_id);
        return Service::find($id)->price;
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $service_id = decrypt($request->id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', ['service_id' => $request->id]),
                "cancel_url" => route('cancelTransaction', ['service_id' => $request->id]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => strval($this->getAmount($request->id))
                    ]
                ]
            ]
        ]);

        $serviceTransaction = ServiceTransaction::create([
            'service_id' => $service_id,
            'client_id' => Auth::user()->id,
            'user_id' => Service::find($service_id)->user_id
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // dd($response);
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {

            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $service_id = decrypt($request->service_id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        $serviceTransaction = ServiceTransaction::where('service_id', '=', $service_id)->update([
            'payment_status' => 'SUCCESSFUL'
        ]);

        $action = Action::create([
            'service_id' => $service_id,
            'sender_id' => Auth::guard()->user()->id, // sender id 0 means it is auto generated or sent by admin
            'action_type' => 'SERVICE_BOUGHT_MESSAGE',
            'receiver_id' => Auth::guard()->user()->id, // receiver 
        ]);

        $message = Message::create([
            'action_id' => $action->id,
            'message' => 'I bought your AI solution. Let’s get it started.',
            'sender_id' => Auth::guard()->user()->id
        ]);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()->route('client.messages', ['service_id' => $service_id])
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()->route('service.details', ['id' => $service_id])->with('error', 'Payment failed');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {

        $service_id = decrypt($request->service_id);
        return redirect()->route('service.details', ['id' => $service_id])->with('error', 'Payment Cancelled');
    }
}
