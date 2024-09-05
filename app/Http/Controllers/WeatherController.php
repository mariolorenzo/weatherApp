<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Services\FoursquareService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;
    protected $foursquareService;

    public function __construct(WeatherService $weatherService, FoursquareService $foursquareService)
    {
        $this->weatherService = $weatherService;
        $this->foursquareService = $foursquareService;
    }

    public function index(Request $request)
    {
        $city = $request->input('city', 'Tokyo');  // Default city is Tokyo
        $weather = $this->weatherService->getWeather($city);
        $venues = $this->foursquareService->getVenues($city);

        return view('weather.index', compact('weather', 'venues', 'city'));
    }
}