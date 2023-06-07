<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AuthController extends Controller
{
    
    public function redirectToAdmin($id){

        Auth::login(User::find(decrypt($id)));

        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request){

        
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
           
            if($user->role == 'Admin') {
                // dd($user);
                return Redirect::to('http://admin.brainx.test:8000/redirect/admin/'.encrypt($user->id));
            }
            return redirect()->route('client.job.detail');
        }
        return redirect("/");
    }

    public function register(Request $request){

        $user = User::create([
            'name' => $request->name,
            'role' => 'Client',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $user->id,
            'country' => $request->country,
            'job_title' => $request->job_title,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('client.job.new');
    }   

    public function isEmailExist(Request $request){

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['result' => true,'invalid' => true, 'message' => 'Invalid email'], 200);
        }
        $user = User::where('email', $request->email)->first();

        if($user != null){
            return response()->json(['result' => true, 'invalid' => false,'message' => 'Email exists'], 200);
        }
        return response()->json(['result' => false,'invalid' => false, 'message' => 'Email does not exist.'], 200);
    }
}
