<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Auth_api
{
    public function info()
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept-Language' => 'uz-UZ',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhYjNiOTM4NS02YWVkLTQxMjgtOWI1NS00YTk0ZWYxODdjZTciLCJyZWZyZXNoIjoiRThZT0NFZFFVcTNQVDNVMkhHYTk1UmU5TlVFQXlHc184Vmx3a21ZVXZydkVOUFhsd0hlblk1VVFkU092aW5WNG1mdXFWZXd4WHVKaXM0S1QyS3Mtb2xNVFYwdWt4ZTBPekRyQ0V0bXB5VHVaQ0lGWm4yWGRxdHlnQzVuazgwR18iLCJpYXQiOjE3MDc3MzgyMTB9.ka4RN0o1PIn90_S-S8gBKTWyvew7c1R3_nYJjXsnDA0',
            'Cookie' => 'PHPSESSID=8c6aa4056fda8793a747aac60ea7e9b2'
        ];
        $request = new Request('GET', 'https://api.core.abiduvn.uz/core/profile/profile/info', $headers);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();
    }
}
