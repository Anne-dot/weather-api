{{-- @props([
    'route' => 'home',
])

<a href="{{ route($route) }}" class="@if (request()->routeIs($route) == $route) border-b @endif">
    {{ $slot }}
</a> --}}

@props([
    'route' => 'weather',
    'city' => null, // Set city to null by default
])

<a href="{{ $city ? route($route, ['city' => $city]) : route($route) }}" 
   class="@if (request()->routeIs('weather')) border-b @endif">
    {{ $slot }}
</a>
