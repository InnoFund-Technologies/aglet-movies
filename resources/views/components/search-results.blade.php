@props(['results' => [], 'isSearching' => false])

<div 
    x-show="searchResults.length > 0 || isSearching"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    class="absolute mt-2 w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden z-50"
    style="display: none;"
>
    <div class="max-h-96 overflow-y-auto">
        @if ($isSearching)
            <div class="p-6 text-center text-gray-500">
                <svg class="animate-spin h-6 w-6 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="text-sm">Searching...</p>
            </div>
        @else
            @if (count($results) > 0)
                @foreach ($results as $movie)
                    <a 
                        href="{{ route('show', $movie['id']) }}"
                        class="flex items-center gap-4 p-4 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 cursor-pointer"
                    >
                        <img 
                            src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w92' . $movie['poster_path'] : '/images/no-poster.jpg' }}"
                            alt="{{ $movie['title'] }}"
                            class="w-12 h-18 object-cover rounded"
                            onerror="this.src='/images/no-poster.jpg'"
                        >
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-900 dark:text-white truncate">{{ $movie['title'] }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <span>{{ isset($movie['release_date']) ? substr($movie['release_date'], 0, 4) : 'N/A' }}</span>
                                @if(isset($movie['vote_average']))
                                    <span class="ml-2">{{ number_format($movie['vote_average'], 1) }} ★</span>
                                @endif
                            </p>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="p-4 text-center text-gray-500">
                    <p class="text-sm">No results found</p>
                </div>
            @endif
        @endif
    </div>
</div>