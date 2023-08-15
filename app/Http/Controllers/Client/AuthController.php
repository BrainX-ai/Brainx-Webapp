<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function redirectToAdmin($id)
    {

        Auth::login(User::find(decrypt($id)));

        return redirect()->route('admin.dashboard');
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->role == 'Admin') {
                // dd($user);
                return Redirect::to(env('URL_SCHEME') . '://admin.brainx.' . env('URL_END') . '/redirect/admin/' . encrypt($user->id));
            }
            Auth::login($user);
            if (session('service_id')) {
                $service_id = session('service_id');
                Session::forget('service_id');
                return redirect()->route('client.service.details', ['id' => $service_id]);
            }
            return redirect()->route('client.job.detail');
        }
        return redirect("/");
    }

    public function register(Request $request)
    {

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

        if (session('service_id')) {
            $service_id = session('service_id');
            Session::forget('service_id');
            return redirect()->route('client.service.details', ['id' => $service_id]);
        }

        return redirect()->route('client.messages.all');
    }

    public function isEmailExist(Request $request)
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['result' => true, 'invalid' => true, 'message' => 'Invalid email'], 200);
        }
        $user = User::where('email', $request->email)->first();

        if ($user != null) {
            return response()->json(['result' => true, 'invalid' => false, 'message' => 'Email exists'], 200);
        }
        return response()->json(['result' => false, 'invalid' => false, 'message' => 'Email does not exist.'], 200);
    }
}
