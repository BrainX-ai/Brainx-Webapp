<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request){
        event(new ChatMessage(Auth::user()->name, $request->message, $request->job_id));

        return response()->json(['status' => 'ok'], 200);
    }
}
