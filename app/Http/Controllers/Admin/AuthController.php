<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

    public function index(){
        // dd('sdf');
        return view('pages.admin.auth.login');
    }
    
    public function login(Request $request){

        
        $user = User::where('email', $request->email)->where('role', 'Admin')->first();
        if($user){
        
        if (Hash::check($request->password, $user->password)) {
            
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        }
    }
        return redirect()->route("admin.login.form");
        

    }

}
