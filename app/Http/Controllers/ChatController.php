<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Models\Action;
use App\Models\Message;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request){
        event(new ChatMessage(Auth::user()->name, $request->message, $request->job_id, $request->receiver_id, $request->photo));

        $this->storeChatMessage($request);

        return response()->json(['status' => 'ok'], 200);
    }

    public function storeChatMessage(Request $request){

        $action = Action::create([
            'sender_id' => Auth::user()->id,
            'job_id' => $request->job_id,
            'action_type' => 'ONLY_MESSAGE',
            'receiver_id' => $request->receiver_id
        ]);

        if($action){
            $message = Message::create([
                'action_id' => $action->id,
                'sender_id' => Auth::user()->id,
                'message' => $request->message,
            ]);
        }
    }
}
