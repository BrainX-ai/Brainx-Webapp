<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use App\Models\Talent;
use Abraham\TwitterOAuth\TwitterOAuth;


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

            if($linkedinUser){

                Auth::login($linkedinUser);
                $talent = Talent::where('user_id',$linkedinUser->id)->first();
                try{
                $talent->photo = $user->user['profilePicture']['displayImage~']['elements'][2]['identifiers'][0]['identifier'];
                }catch(Exception $ex){
                    $talent->photo = '';
                }
                $talent->save();

                if($talent->status == "INCOMPLETE"){
                    return redirect()->route('build.profile')->with(['user'=> $linkedinUser]);
                }else if($talent->status == "ASSESSMENT_PENDING"){
                    return redirect()->route('show.profile', encrypt($linkedinUser->id))->with(['user'=> $linkedinUser]);
                }else{
                    return redirect()->route('talent.care')->with(['user'=> $linkedinUser]);

                }

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => 'linkedin',
                    'password' => encrypt('admin12345'),
                    'role' => 'Talent'
                ]);
                $newUser->markEmailAsVerified();
                try{
                $talent = Talent::create([
                    'photo' => $user->user['profilePicture']['displayImage~']['elements'][2]['identifiers'][0]['identifier'],
                    'user_id' => $newUser->id
                ]);
            }catch(Exception $ex){
                $talent = Talent::create([
                    'photo' => '',
                    'user_id' => $newUser->id
                ]);
            }
                Auth::login($newUser);

                return redirect('/build-profile')->with(['user'=> $newUser]);
            }

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function s(Request $request)
{
    $client_id = '8656iww9kfxvmo';
    $client_secret = 'FVWSbcWDORf9NAa5';
    $redirect_uri = 'http://localhost:8000/auth/linkedin/callback';

    $oauth_verifier = $request->get('code');

    $connection = new TwitterOAuth($client_id, $client_secret);
    $access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => 'sfasdfds'));

    $access_token_secret = $access_token['oauth_token_secret'];
    $access_token = $access_token['oauth_token'];

    $connection = new TwitterOAuth($client_id, $client_secret, $access_token, $access_token_secret);

    $params = [
        'format' => 'json',
        'type' => 'linkedin-edu',
        'secure_url' => $request->get('secureUrl'),
        'response_url' => $request->getRequestUri(),
        'responsys-id' => $request->get('responsysId'),
    ];

    $url = 'https://www.linkedin.com/profile/profile-edu-certification-data-extract?' . http_build_query($params);

    $content = $connection->get($url);

    $education = json_decode($content, true)['education'];

    $params = [
        'format' => 'json',
        'type' => 'linkedin-expr',
        'secure_url' => $request->get('secureUrl'),
        'response_url' => $request->getRequestUri(),
        'responsys-id' => $request->get('responsysId'),
    ];

    $url = 'https://www.linkedin.com/profile/profile-expr-data-extract?' . http_build_query($params);

    $content = $connection->get($url);

    $experience = json_decode($content, true)['experience'];
    dd($experience, $education);
    // Store the education and experience data in your database or display it on the page
}
}
