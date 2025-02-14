<x-layout>
    <x-slot:title>Current Weather</x-slot:title>

    <x-slot:description>
        This is a school project where I am learning to use an API and to display this data
    </x-slot:description>

    @if (session('error'))
        <div class="alert alert-danger text-center text-red-500 text-sm">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('weather.search') }}" method="POST" class="max-w-md mx-auto mb-8">
        @csrf
        <div class="flex gap-2">
            <input type="text" name="city" placeholder="Enter city name"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent">
            <button type="submit" class="bg-gray-600 px-4 py-2 text-sm text-white rounded-md hover:bg-gray-500">
                Get Weather
            </button>
        </div>
    </form>

    @if (isset($weatherData))
        <div class="p-6 max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-6 rounded-xl mb-6">
                <h1 class="text-xl text-gray-600">Current Weather in</h1>
                <h2 class="text-3xl font-bold">{{ $weatherData['name'] }}</h2>
                <p class="text-6xl font-bold mt-4">{{ round($weatherData['main']['temp']) }}°C</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-gray-500">Weather</p>
                    <div class="flex items-center gap-2">
                        <img src="https://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}@2x.png"
                            alt="{{ $weatherData['weather'][0]['description'] }}">
                        <span
                            class="text-xl font-medium capitalize">{{ $weatherData['weather'][0]['description'] }}</span>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-gray-500">Feels Like</p>
                    <p class="text-xl font-medium">{{ round($weatherData['main']['feels_like']) }}°C</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <p class="text-gray-500">Humidity</p>
                    <p class="text-xl font-medium">{{ $weatherData['main']['humidity'] }}%</p>
                </div>
            </div>
        </div>
    @endif
</x-layout>
