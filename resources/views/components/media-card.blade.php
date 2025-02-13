@props(['media'])
@php
use Carbon\Carbon;

// Handle both movie and TV show data
$title = $media['title'] ?? $media['name'] ?? '';
$releaseDate = $media['release_date'] ?? $media['first_air_date'] ?? '';
$route = isset($media['first_air_date']) ? 'tv-shows.show' : 'movies.show';
@endphp 

<article class="relative overflow-hidden rounded-3xl shadow-sm transition-all duration-200 hover:scale-105 bg-gray-800 cursor-pointer hover:shadow-lg h-72 md:h-80 w-full max-w-64">
    <img
        alt="{{ $title }}"
        src="https://image.tmdb.org/t/p/w500{{ $media['poster_path'] }}"
        class="absolute inset-0 h-full w-full object-cover transition-all duration-500" />
    <div class="relative bg-gradient-to-t from-gray-900/95 to-gray-900/5 transition-all duration-500 h-full hover:bg-gray-900/40">
        <a href="{{ route($route, $media['id']) }}" class="absolute bottom-0 left-0 right-0 top-0 h-full">
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
                <!-- Description Overlay -->
                <p class="absolute inset-0 p-4 text-sm text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                    <span class="line-clamp-6">
                        {{ $media['overview'] }}
                    </span>
                </p>
            </div>
        </a>
    </div>
</article>