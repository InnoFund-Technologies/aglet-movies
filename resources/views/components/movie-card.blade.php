@php
use Carbon\Carbon;
@endphp

@props(['movie'])

<article class="relative overflow-hidden rounded-3xl shadow-sm transition-all duration-200 hover:scale-105 cursor-pointer hover:shadow-lg h-80 min-w-64">
    <img
        alt="{{ $movie['title'] }}"
        src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
        class="absolute inset-0 h-full w-full object-cover transition-all duration-500" />
    <div class="relative bg-gradient-to-t from-gray-900/95 to-gray-900/5 pt-32 sm:pt-48 lg:pt-56 transition-all duration-500 hover:bg-gray-900/40">
        <a href="{{ route('movies.show', $movie['title']) }}">
            <div class="p-4 sm:p-6">
                <div class="text-sm text-gray-300 mt-2 flex items-center gap-2">
                    <span class="bg-[#FF2D20] text-white px-2 py-1 rounded-full text-xs">
                        {{ number_format($movie['vote_average'], 1) }} ★
                    </span>
                    <time datetime="{{ $movie['release_date'] }}" class="block text-sm text-white/90">
                        {{ Carbon::parse($movie['release_date'])->format('j M Y') }}
                    </time>
                </div>

                <h3 class="mt-0.5 text-lg text-white font-bold">{{ $movie['title'] }}</h3>

                <!-- Description Overlay -->
                <p class="absolute inset-0 p-4 text-sm text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                    <span class="line-clamp-6">
                        {{ $movie['overview'] }}
                    </span>
                </p>
            </div>
        </a>
    </div>
</article>