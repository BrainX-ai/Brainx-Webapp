<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Models\Action;
use App\Models\Message;
use App\Models\File;
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

    public function uploadChatFile(Request $request)
    {

        $action = Action::create([
            'sender_id' => Auth::user()->id,
            'job_id' => $request->job_id,
            'action_type' => 'ONLY_MESSAGE_WITH_FILE',
            'receiver_id' => $request->receiver_id
        ]);

        if($action){
            $message = Message::create([
                'action_id' => $action->id,
                'sender_id' => Auth::user()->id,
                'message' => 'Sent a file',
            ]);
        }
        
 
       $name = time().'.'.request()->file->getClientOriginalExtension();
  
       $request->file->move(public_path('uploads'), $name);
     
        $file = File::create([
            'file_name' => $name,
            'file_extension' => $request->file('file')->getClientOriginalExtension(),
            'file_type' => $request->file('file')->getClientMimeType(),
            'file_url' => '/assets/uploads/'.$name,
            'action_id' => $action->id
            // 'file_size' => $request->file('file')->getSize(),
        ]);

        return response()->json(['status' => 'ok'], 200);
  
        
    }
}