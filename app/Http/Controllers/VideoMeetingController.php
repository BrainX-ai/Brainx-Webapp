<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssessmentCateory;
use App\Models\VideoMeeting;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class VideoMeetingController extends Controller
{
    //

    private $counter = 0;

    public function get_access_token()
    {
        $meeting = VideoMeeting::where('provider', 'zoom')->first();
        return json_decode($meeting->provider_value);
    }

    public function get_refresh_token()
    {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }

    public function update_access_token($token)
    {
        echo $result  = VideoMeeting::updateOrCreate(
            ['provider' => 'zoom'],
            ['provider_value' => $token]
        );
    }


    function create_meeting()
    {

        $this->counter++;
        if ($this->counter > 2) {
            return false;
        }
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
                    "start_time" => "2023-07-29T12:30:00",
                    "timezone" => "Asia/Dhaka",
                    "duration" => "40", // 30 mins
                    "password" => "123456",
                    "settings:" => [
                        "join_before_host" => true,
                        "host_video" => true,
                        "participant_video" => true,
                        "approval_type" => 2,
                        "audio" => "voip",
                        "enforce_login" => false,
                        "auto_recording" => "none",
                        "alternative_hosts" => "tawsif.online@gmail.com;hector@brainx.biz",
                        "alternative_hosts_email_notification" => true
                    ]
                ],
            ]);

            $data = json_decode($response->getBody());
            echo "Join URL: " . $data->join_url;
            echo "<br>";
            echo "Meeting Password: " . $data->password;

            try {
                $mailData = [
                    'subject' => 'Book session for consultation at BrainX',
                    'body' => 'A new session is booked.',
                    'button_text' => 'Zoom Meeting',
                    'button_url' => $data->join_url,
                    'receiver' => 'Participants',
                    'preheadtext' => 'Booking session created for consultation '
                ];

                Mail::to(["tawsif.online@gmail.com", "hector@brainx.biz"])->send(new SendMail($mailData));
            } catch (\Exception $ex) {
            }
        } catch (\Exception $e) {
            if (401 == $e->getCode()) {
                // dd('error', $e->getMessage());
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
                $token = json_decode($response->getBody()->getContents(), true);

                echo $e->getMessage();

                $this->update_access_token(json_encode($token));
                $this->create_meeting();
            } else {
                echo $e->getMessage();
            }
        }
    }
}
