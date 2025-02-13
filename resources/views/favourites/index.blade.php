<x-app-layout>
    <h2 class="text-xl font-bold text-gray-100 mt-8">Favourites</h2>
    <div class="grid grid-cols-12 lg:grid-cols-10 gap-4">
        @foreach($response as $tvShow)
        <div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-2 flex flex-grow justify-center md:justify-start">
            <x-media-card :media="$tvShow" />
        </div>
        @endforeach
    </div> 
</x-app-layout>