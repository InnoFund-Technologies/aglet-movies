<x-layout>
    <section class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
        <x-movie-filter />

        <h2 class="text-xl font-bold text-gray-100">TV Shows</h2>
        <div class="grid grid-cols-12 lg:grid-cols-10 gap-4 pt-6">
            @foreach($response as $tvShow)
            <div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-2 flex flex-grow justify-center md:justify-start">
                <x-media-card :media="$tvShow" />
            </div>
            @endforeach
        </div>
        <x-movie-pagination
            :current-page="$currentPage"
            :total-pages="$totalPages"
            :total-results="$totalResults"
            :base-url="request()->url()" />
    </section>
</x-layout>