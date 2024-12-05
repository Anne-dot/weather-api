<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.post');

// Route::get('/weather/{city}', [WeatherController::class, 'getWeather'])->name('weather.city');
