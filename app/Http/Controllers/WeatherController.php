<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{

    public function index()
    {
        // Check if we have weather data in the session
        $weatherData = session('weatherData');
        return view('weather.index', compact('weatherData'));
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'city' => 'required|min:2'
        ], [
            'city.required' => "Please enter city name",
            'city.min' => "City name must be at least 2 characters"
        ]);

        $city = $request->input('city');

        try{
            $response = Http::get("https://pro.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric',
            ]);
            $weatherData = $response->json();

        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Connection failed');
        }
        

        if($weatherData["cod"] == "404"){
            return redirect()->back()->with('error', "{$city} not found");
        }elseif($weatherData["cod"] == "401"){
            return redirect()->back()->with('error', "Invalid API key");
        }elseif($weatherData["cod"] == "429"){
            return redirect()->back()->with('error', "Too many requests. Please try again later.");
        }elseif(in_array($weatherData["cod"], ["500", "502", "503", "504"])){
            return redirect()->back()->with('error', "Server error. Please try again later");
        }

        return redirect()->route('weather.index')->with('weatherData', $weatherData);
    }
}
