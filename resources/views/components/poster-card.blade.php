@props(['media'])

@php
use Carbon\Carbon;

// Handle both movie and TV show data
$title = $media['title'] ?? $media['name'] ?? 'Untitled';
$releaseDate = $media['release_date'] ?? $media['first_air_date'] ?? null;
$posterPath = $media['poster_path'] ?? null;
$voteAverage = $media['vote_average'] ?? 0;
@endphp

<article
    x-data="favorites()"
    class="relative overflow-hidden rounded-3xl shadow-sm transition-all duration-200 hover:scale-105 bg-gray-800 cursor-pointer hover:shadow-lg h-72 md:h-80 w-full max-w-64">
    <!-- Poster Image -->
    @if($posterPath)
    <img
        alt="{{ $title }}"
        src="https://image.tmdb.org/t/p/w500{{ $posterPath }}"
        class="absolute inset-0 h-full w-full object-cover transition-all duration-500" />
    @else
    <!-- Fallback image or placeholder -->
    <div class="absolute inset-0 h-full w-full bg-gray-700 flex items-center justify-center">
        <span class="text-white text-sm">No Image Available</span>
    </div>
    @endif

    <!-- Overlay Content -->
    <div class="relative bg-gradient-to-t from-gray-900/95 to-gray-900/5 transition-all duration-500 h-full hover:bg-gray-900/40">
        <div class="p-4 sm:p-6 h-full flex flex-col justify-end z-10">
            <!-- Rating and Release Date -->
            <div class="text-sm text-gray-300 mt-2 flex items-center gap-2">
                <span class="bg-[#FF2D20] text-white px-2 py-1 rounded-full text-xs">
                    {{ number_format($voteAverage, 1) }} ★
                </span>
                @if($releaseDate)
                <time datetime="{{ $releaseDate }}" class="block text-sm text-white/90">
                    {{ Carbon::parse($releaseDate)->format('j M Y') }}
                </time>
                @endif
            </div>

            <!-- Title -->
            <h3 class="mt-0.5 text-lg text-white font-bold">{{ $title }}</h3>

            <!-- Actions -->
            <div class="absolute inset-0 p-4 text-sm text-white opacity-0 transition-opacity duration-300 hover:opacity-100 flex items-center justify-center">
                <div class="flex items-center gap-6">
                    <!-- Add to Favourites Button -->
                    <button
                        x-bind:class="{ 'text-[#FF2D20]': isFavourite, 'hover:text-[#FF2D20]': !isFavourite }"
                        x-on:click="addToFavourites({{ $media['id'] }})"
                        x-bind:disabled="loading">
                        <template x-if="!loading">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                :fill="isFavorited ? 'currentColor' : 'none'"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-heart">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                        </template>
                        <template x-if="loading">
                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </template>
                    </button>
                    <!-- View Details Link -->
                    <a href="{{ route('movie.show', $media['id'] ?? 0) }}" class="hover:text-[#FF2D20]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>