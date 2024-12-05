<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather API</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex min-h-screen flex-col">
    <nav>
        <div class="bg-slate-800 text-white p-4">
            <div class="mx-auto max-w-screen-lg flex justify-between items-center">
                <a href="/" class="text-xl font-bold">Weather API</a>
                <div class="flex gap-4"> 
                    <x-nav.link route="weather">Weather</x-nav.link>
                </div>
            </div>
        </div>
    </nav>
    <div class="mx-auto max-w-screen-lg w-full px-4 py-8 sm:px-6 sm:py-12 lg:px-8 flex-1 ">
        <header class="bg-white">
            <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    @if (session()->has('message'))
                    <p class="text-green-600">{{ session()->get('message')}}</p>
                    @endif
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">{{ $title ?? 'Title' }}</h1>

                    <p class="mt-1.5 text-sm text-gray-500">
                        {{ $description ?? 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, recusandae.' }}
                    </p>
                </div>
                {{ $actions ?? '' }}
            </div>
        </header>
        <div class="overflow-x-auto mt-6">
            {{ $slot }}
        </div>
    </div>

    <footer class="bg-gray-50 border-t text-sm p-4">
        <div class="mx-auto max-w-screen-lg">
            <div class="flex justify-between items-center">
                <div>
                    <a href="/about" class="text-gray-600 hover:text-gray-900">About Us</a>
                    <a href="/contact" class="ml-4 text-gray-600 hover:text-gray-900">Contact</a>
                </div>
                <div>
                    <a href="https://twitter.com" class="text-gray-600 hover:text-gray-900">Twitter</a>
                    <a href="https://facebook.com" class="ml-4 text-gray-600 hover:text-gray-900">Facebook</a>
                </div>
            </div>
            <p class="text-center">© 2024 Weather API</p>
        </div>
    </footer>
</body>

</html>
