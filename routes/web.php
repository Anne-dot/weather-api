<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/', [WeatherController::class, 'search'])->name('weather.search');





// Route::get('/weather/{city}', [WeatherController::class, 'getWeather'])->name('weather.city');
