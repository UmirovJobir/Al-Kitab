<?php

require_once 'vendor/autoload.php'; // Include Composer's autoloader

use GuzzleHttp\Client;

function getUserInfo($accessToken) {
    $client = new Client();

    try {
        $response = $client->request('GET', 'https://api.core.abiduvn.uz/core/profile/profile/info', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
                'Accept-Language' => 'uz-UZ',
            ]
        ]);

        return json_decode($response->getBody(), true); // Decode JSON response
    } catch (Exception $e) {
        // Handle exception (e.g., connection error)
        return null;
    }
}

