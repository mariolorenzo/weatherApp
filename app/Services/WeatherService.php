<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHERMAP_API_KEY');
    }

    public function getWeather($city)
    {
        $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city},JP&appid={$this->apiKey}&units=metric";
        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}