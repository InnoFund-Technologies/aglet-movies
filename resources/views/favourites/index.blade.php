<x-app-layout>
    <h2 class="text-xl font-bold text-gray-100 mt-8">Favourites</h2>
    <div class="grid grid-cols-12 lg:grid-cols-10 gap-4">
        @if (empty($response))
        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white text-center col-span-10">Click here, to browse movies to add favourites</a>
        @else
        @foreach($response as $tvShow)
        <div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-2 flex flex-grow justify-center md:justify-start">
            <x-poster-card :media="$tvShow" />
        </div>
        @endforeach
        @endif
    </div>
</x-app-layout>