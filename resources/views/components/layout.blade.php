<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather API</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex min-h-screen flex-col">
    <nav>
        <div class="bg-gray-50 text-gray-700 p-4 border-b">
            <div class="mx-auto max-w-screen-lg flex justify-between items-center">
                <h1 class="text-xl font-bold">Current Weather</h1>
                <a href="https://github.com/Anne-dot/weather-api" target="_blank" class="text-sm">GitHub</a>
            </div>
        </div>
    </nav>
    <div class="mx-auto max-w-screen-lg w-full px-4 py-8 sm:px-6 sm:py-12 lg:px-8 flex-1 ">
        <header class="bg-white">
            <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    @if (session()->has('message'))
                        <p class="text-green-600">{{ session()->get('message') }}</p>
                    @endif

                </div>
                {{-- This is an optional slot for actions --}}
                {{ $actions ?? '' }}
            </div>
        </header>
        <div class="overflow-x-auto mt-6">
            {{ $slot }}
        </div>
    </div>

    <footer class="bg-gray-50 border-t text-sm p-4">
        <div class="mx-auto max-w-screen-lg">
            <p class="text-center">© {{ date('Y') }} Weather API</p>
        </div>
    </footer>
</body>

</html>
