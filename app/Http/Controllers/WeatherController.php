<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    public function getWeather($city)
    {

        // Log the cache status
        if (Cache::has("weather_{$city}")) {
            // Log when the data is fetched from the cache
            Log::info("Weather data found in cache for {$city}.");
        } else {
            // Log when no cache is found
            Log::info("No weather data found for {$city} in cache.");
        }
        // Check if the weather data for this city is cached
        $weather = Cache::remember("weather_{$city}", 3600, function () use ($city) {

            // Log when the data is being fetched from the API (not cache)
            Log::info("Fetching weather data for {$city} from the API.");

            // Make the API request to OpenWeatherMap
            $response = Http::get("http://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => env('WEATHER_API_KEY'),
                'units' => 'metric',  // Optional: for temperature in Celsius
            ]);

            // Return the response as JSON
            return $response->json();
        });
        // Get the weather icon code and the url of the icon - 
        // https://openweathermap.org/weather-conditions#Weather-Condition-Codes-2

        // Return the weather data as a JSON response
        return response()->json($weather);
    }
}
