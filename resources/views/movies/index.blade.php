<x-app-layout>
    <x-movie-filter />
    <h2 class="text-xl font-bold text-gray-100">Movies</h2>
    <div class="grid grid-cols-12 lg:grid-cols-10 gap-4 pt-6">
        @foreach($response as $movie)
        <div class="col-span-6 sm:col-span-4 md:col-span-3 gap-4 lg:col-span-2 flex flex-grow justify-center md:justify-start">
            <x-media-card :media="$movie" />
        </div>
        @endforeach
    </div>
    <x-movie-pagination
        :current-page="$currentPage"
        :total-pages="$totalPages"
        :total-results="$totalResults"
        :base-url="request()->url()" />
</x-app-layout>