<?php

namespace App\Http\Controllers\Utils;

class ChatPDF
{

    private $postFields = [];
    private $x_api_key = 'sec_dgVGvVydu7AGaIgZJuMN64wRyYvWUow3';
    private $sourceId;
    private $curl;

    public function __construct()
    {

        $this->curl = curl_init();
        $this->postFields = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',

            CURLOPT_HTTPHEADER => array(
                'x-api-key: ' . $this->x_api_key,
                'Content-Type: application/json'
            ),
        );
    }

    public function setPostFields($data)
    {
        $this->postFields[CURLOPT_POSTFIELDS] = $data;
    }

    public function sendMessage()
    {

        $this->postFields[CURLOPT_URL] = 'https://api.chatpdf.com/v1/chats/message';
        return $this->sendRequest();
    }

    public function uploadFile()
    {

        $this->postFields[CURLOPT_URL] = 'https://api.chatpdf.com/v1/sources/add-url';
        return $this->sendRequest();
    }

    public function sendRequest()
    {
        curl_setopt_array($this->curl, $this->postFields);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        return json_decode($response);
    }

    public function getSourceId()
    {
        return $this->sourceId;
    }

    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }
}
