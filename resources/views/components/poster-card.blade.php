@props(['media'])

@php
use Carbon\Carbon;

// Handle both movie and TV show data
$title = $media['title'] ?? $media['name'] ?? '';
$releaseDate = $media['release_date'] ?? $media['first_air_date'] ?? '';
@endphp

<article class="relative overflow-hidden rounded-3xl shadow-sm transition-all duration-200 hover:scale-105 bg-gray-800 cursor-pointer hover:shadow-lg h-72 md:h-80 w-full max-w-64">
    <img
        alt="{{ $title }}"
        src="https://image.tmdb.org/t/p/w500{{ $media['poster_path'] }}"
        class="absolute inset-0 h-full w-full object-cover transition-all duration-500" />
    <div class="relative bg-gradient-to-t from-gray-900/95 to-gray-900/5 transition-all duration-500 h-full hover:bg-gray-900/40">

        <div class="p-4 sm:p-6 h-full flex flex-col justify-end z-10">
            <div class="text-sm text-gray-300 mt-2 flex items-center gap-2">
                <span class="bg-[#FF2D20] text-white px-2 py-1 rounded-full text-xs">
                    {{ number_format($media['vote_average'], 1) }} ★
                </span>
                @if($releaseDate)
                <time datetime="{{ $releaseDate }}" class="block text-sm text-white/90">
                    {{ Carbon::parse($releaseDate)->format('j M Y') }}
                </time>
                @endif
            </div>
            <h3 class="mt-0.5 text-lg text-white font-bold">{{ $title }}</h3>
            <!-- actions -->
            <div class="absolute inset-0 p-4 text-sm text-white opacity-0 transition-opacity duration-300 hover:opacity-100 flex items-center justify-center">
                <diV class="flex items-center gap-6">
                    <button class="hover:text-[#FF2D20]" onclick="window.addToFavourites({{ $media['id'] }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart">
                            <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                        </svg>
                    </button>
                    <button
                        @click="$wire.emit('openMovieModal', '1')"
                        class=" hover:text-[#FF2D20]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                            <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </diV>
            </div>
        </div>
    </div>
</article>