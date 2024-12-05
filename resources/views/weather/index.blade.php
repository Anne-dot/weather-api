<x-layout>
    <x-slot:title>Current Weather</x-slot:title>

    <x-slot:description>
        This is a school project where I am learning to use an API and to display this data
    </x-slot:description>

    <form action="{{route('weather.post')}}" method="POST">
        @csrf
        <input type="text", name="city" placeholder="Enter city name">
        <button type="submit" class="bg-slate-800 px-3 py-2 text-sm text-white rounded-md hover:bg-slate-700">Get Weather</button>
    </form>
    
</x-layout>
