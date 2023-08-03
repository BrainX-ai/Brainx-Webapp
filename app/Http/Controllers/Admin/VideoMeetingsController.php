<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoMeeting;

class VideoMeetingsController extends Controller
{

    public function index()
    {

        return view('pages.admin.zoom');
    }

    public function callback()
    {

        try {
            $client = new \GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);

            $response = $client->request('POST', '/oauth/token', [
                "headers" => [
                    "Authorization" => "Basic " . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'))
                ],
                'form_params' => [
                    "grant_type" => "authorization_code",
                    "code" => $_GET['code'],
                    "redirect_uri" => env('ZOOM_REDIRECT_URL')
                ],
            ]);

            $token = json_decode($response->getBody()->getContents(), true);

            dd($token);
            $this->update_access_token(json_encode($token));

            return view('pages.admin.zoom')->with('token', $token);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update_access_token($token)
    {
        VideoMeeting::updateOrCreate(
            ['provider' => 'zoom'],
            ['provider_value' => $token]
        );
    }

    function create_meeting()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);


        $arr_token = $this->get_access_token();
        $accessToken = $arr_token->access_token;

        try {
            $response = $client->request('POST', '/v2/users/me/meetings', [
                "headers" => [
                    "Authorization" => "Bearer $accessToken"
                ],
                'json' => [
                    "topic" => "Let's test zoom meeting",
                    "type" => 2,
                    "start_time" => "2023-07-28T20:30:00",
                    "duration" => "30", // 30 mins
                    "password" => "123456",
                    "settings:" => [
                        "join_before_host" => true,
                        "host_video" => true,
                        "participant_video" => true,
                        "approval_type" => 2,
                        "audio" => "voip",
                        "enforce_login" => false,
                        "auto_recording" => "none"
                    ]
                ],
            ]);

            $data = json_decode($response->getBody());
            echo "Join URL: " . $data->join_url;
            echo "<br>";
            echo "Meeting Password: " . $data->password;
        } catch (\Exception $e) {
            if (401 == $e->getCode()) {
                $refresh_token = $this->get_refresh_token();

                $client = new \GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
                $response = $client->request('POST', '/oauth/token', [
                    "headers" => [
                        "Authorization" => "Basic " . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'))
                    ],
                    'form_params' => [
                        "grant_type" => "refresh_token",
                        "refresh_token" => $refresh_token
                    ],
                ]);
                $this->update_access_token($response->getBody());

                $this->create_meeting();
            } else {
                echo $e->getMessage();
            }
        }
    }
}
