<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

trait AuthApi
{
    function getUserInfo($accessToken)
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://api.core.abiduvn.uz/core/profile/profile/info', [
                'headers' => [
                    'Authorization' => $accessToken,
                    'Content-Type' => 'application/json',
                    'Accept-Language' => 'uz-UZ',
                ]
            ]);

            $data = json_decode($response->getBody(), true); // Decode JSON response
            $id = $data['body']['User']['identity']['id'];
            Cache::put('user_info' . $accessToken, $id);
            return $id;
        } catch (\Exception $e) {
            return null;
        }
    }
}
