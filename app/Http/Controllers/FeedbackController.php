<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Auth;

class FeedbackController extends Controller
{
    

    public function store(Request $request){

        try {

        if(Auth::guard()->user()){
            $request->name = Auth::guard()->user()->name;
            $request->email = Auth::guard()->user()->email;
            
        }
            
        $feedback = Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'topic' => $request->topic,
            'message' => $request->message
        ]);

        return response()->json(['success' => 1], 200);
        } catch (\Throwable $th) {
            
        return response()->json(['success' => 0], 200);
        }
    }

}
