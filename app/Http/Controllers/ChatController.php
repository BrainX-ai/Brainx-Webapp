<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Mail\SendMail;
use App\Models\Action;
use App\Models\Message;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        event(new ChatMessage(Auth::user()->name, $request->message, $request->service_id, $request->receiver_id, $request->photo, 'text'));

        $this->storeChatMessage($request);

        return response()->json(['status' => 'ok'], 200);
    }

    public function storeChatMessage(Request $request)
    {

        $action = Action::create([
            'sender_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'service_transaction_id' => $request->service_transaction_id,
            'action_type' => 'ONLY_MESSAGE',
            'receiver_id' => $request->receiver_id
        ]);

        if ($action) {
            $message = Message::create([
                'action_id' => $action->id,
                'sender_id' => Auth::user()->id,
                'message' => $request->message,
            ]);
        }

        $actions = Action::where('send_id', Auth::user()->id)->where('service_id', $request->service_id)->get();
        if (sizeof($actions) > 0) {
            $receiver = User::find($action->receiver_id);
            try {
                $mailData = [
                    'subject' => 'BrainX found an AI talent for you',
                    'body' => 'We have found an AI talent that is suitable to your request. Go to the conversation and view the talent’s profile.',
                    'button_text' => 'Go',
                    'button_url' => route('client.job.details', $request->job_id),
                    'receiver' => $receiver->name,
                    'preheadtext' => 'We have found an AI talent that is suitable to your request'
                ];

                Mail::to($receiver->email)->send(new SendMail($mailData));
            } catch (\Exception $ex) {
            }
        }
    }

    public function uploadChatFile(Request $request)
    {

        $action = Action::create([
            'sender_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'service_transaction_id' => $request->service_transaction_id,
            'action_type' => 'ONLY_MESSAGE_WITH_FILE',
            'receiver_id' => $request->receiver_id
        ]);

        if ($action) {
            $message = Message::create([
                'action_id' => $action->id,
                'sender_id' => Auth::user()->id,
                'message' => 'Sent a file',
            ]);
        }


        $name = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('storage'), $name);

        $file = File::create([
            'file_name' => $request->file('file')->getClientOriginalName(),
            'file_extension' => $request->file('file')->getClientOriginalExtension(),
            'file_type' => $request->file('file')->getClientMimeType(),
            'file_url' => $name,
            'action_id' => $action->id
            // 'file_size' => $request->file('file')->getSize(),
        ]);

        event(new ChatMessage(Auth::user()->name, $file->file_name . '#&*' . $file->id, $request->job_id, $request->receiver_id, $request->photo, 'file'));


        return response()->json(['status' => 'ok', 'message' => $name], 200);
    }

    public function downloadFile(Request $request)
    {

        $file = File::find($request->file_id);
        $file_path = public_path('storage/' . $file->file_url);
        $headers = array('Content-Type' => $file->file_type);

        return \Response::download($file_path, $file->file_name, $headers);
    }
}
