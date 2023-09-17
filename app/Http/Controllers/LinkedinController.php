<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Talent;
use Abraham\TwitterOAuth\TwitterOAuth;

use Laravel\Socialite\Facades\Socialite;



class LinkedinController extends Controller
{
    public function linkedinRedirect()
    {

        return Socialite::driver('linkedin')->redirect();
    }

    public function linkedinCallback()
    {
        try {

            $user = Socialite::driver('linkedin')->user();
            // dd($user->user['profilePicture']);
            $linkedinUser = User::where('oauth_id', $user->id)->first();

            if ($linkedinUser) {


                Auth::login($linkedinUser);
                $talent = Talent::where('user_id', $linkedinUser->id)->first();
                try {
                    $talent->photo = $user->user['profilePicture']['displayImage~']['elements'][2]['identifiers'][0]['identifier'];
                } catch (Exception $ex) {
                    $talent->photo = '';
                }
                $talent->save();



                if ($talent->status == "INCOMPLETE") {
                    return redirect()->route('build.profile')->with(['user' => $linkedinUser]);
                } else if ($talent->status == "ASSESSMENT_PENDING") {
                    return redirect()->route('show.profile', encrypt($linkedinUser->id))->with(['user' => $linkedinUser]);
                } else {
                    return redirect()->route('show.profile', ['id' => encrypt($linkedinUser->id)]);
                    return redirect()->route('talent.care')->with(['user' => $linkedinUser]);
                }
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'linkedin',
                    'password' => encrypt('admin12345'),
                    'role' => 'Talent'
                ]);
                $newUser->markEmailAsVerified();
                try {
                    $talent = Talent::create([
                        'photo' => $user->user['profilePicture']['displayImage~']['elements'][2]['identifiers'][0]['identifier'],
                        'user_id' => $newUser->id,
                        'status' => 'INCOMPLETE',
                    ]);
                } catch (Exception $ex) {
                    $talent = Talent::create([
                        'photo' => '',
                        'user_id' => $newUser->id
                    ]);
                }
                Auth::login($newUser);

                return redirect()->route('build.profile')->with(['user' => $linkedinUser]);
                // return redirect()->route('show.profile', ['id' => encrypt($newUser->id)]);
                // return redirect()->route('home');
                // return redirect('/build-profile')->with(['user' => $newUser]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
