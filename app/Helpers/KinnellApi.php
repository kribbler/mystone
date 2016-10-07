<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Exception;
use Log;

class KinnellApi
{

    public static function queryJson($settings)
    {
        $settings['parameters']['secret_key'] = config('app.kinnell_api_key');
        $client = new Client();
        $res = $client->request('POST', config('app.kinnell_api_host') . $settings['url'], [
            'headers' => ['Authorization' => 'Bearer ' . config('app.kinnell_api_token')],
            'query' => $settings['parameters'],
            'verify' => false,
        ]);
        $response_status = $res->getStatusCode();
        if($response_status != 200) {
            Log::error('Error accessing API, status code ' . $response_status . ': ' . json_encode($res->getBody()));
            throw new Exception('Error accessing API, please contact IT for assistance. API status code: ' . $response_status);
        }
        $response = json_decode($res->getBody());
        return $response;
    }

}
