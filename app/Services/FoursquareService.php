<?php

namespace App\Services;

use Illuminate\Support\Facades\Http; 

class FoursquareService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('FOURSQUARE_API_KEY');
    }

    public function getVenues($city)
    {
        $url = "https://api.foursquare.com/v3/places/search?near={$city},JP&limit=5";

        // Set the API key in the headers for authentication
        $response = Http::withHeaders([
            'Authorization' => $this->apiKey
        ])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}