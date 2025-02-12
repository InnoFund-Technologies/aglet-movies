<div class="flex flex-wrap gap-4 mb-6">
    {{-- Watchlist Button --}}
    <button
        x-data="{ inWatchlist: @json($isInWatchlist) }"
        @click="
            inWatchlist = !inWatchlist;
            fetch('/api/watchlist/{{ $movie['id'] }}', {
                method: inWatchlist ? 'POST' : 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                }
            })
        "
        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors"
        :class="inWatchlist ? 'bg-red-600 hover:bg-red-700' : 'bg-gray-700 hover:bg-gray-600'"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
        <span x-text="inWatchlist ? 'In Watchlist' : 'Add to Watchlist'"></span>
    </button>

    {{-- Like Button --}}
    <button
        x-data="{ liked: @json($isLiked) }"
        @click="
            liked = !liked;
            fetch('/api/like/{{ $movie['id'] }}', {
                method: liked ? 'POST' : 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                }
            })
        "
        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-colors"
        :class="liked ? 'bg-red-600 hover:bg-red-700' : 'bg-gray-700 hover:bg-gray-600'"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :fill="liked ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <span x-text="liked ? 'Liked' : 'Like'"></span>
    </button>

    {{-- Rating Component --}}
    <div x-data="{ 
        rating: @json($userRating), 
        hoverRating: 0,
        ratings: [1, 2, 3, 4, 5],
        rate(score) {
            this.rating = score;
            fetch('/api/rate/{{ $movie['id'] }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({ rating: score })
            });
        }
    }" class="flex items-center gap-2 px-4 py-2 bg-gray-700 rounded-lg">
        <span class="text-sm">Rate:</span>
        <div class="flex">
            <template x-for="star in ratings">
                <button
                    @click="rate(star)"
                    @mouseenter="hoverRating = star"
                    @mouseleave="hoverRating = 0"
                    class="p-1"
                >
                    <svg
                        class="w-5 h-5 transition-colors"
                        :class="(hoverRating >= star || (!hoverRating && rating >= star)) ? 'text-yellow-500' : 'text-gray-400'"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </button>
            </template>
        </div>
    </div>

    {{-- Share Button --}}
    <div x-data="{ showShare: false }" class="relative">
        <button
            @click="showShare = !showShare"
            class="flex items-center gap-2 px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
            </svg>
            <span>Share</span>
        </button>
        
        <div
            x-show="showShare"
            @click.away="showShare = false"
            class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-lg shadow-lg overflow-hidden z-50"
        >
            <div class="p-2">
                
                    href="https://twitter.com/intent/tweet?text=Check out {{ urlencode($movie['title']) }}&url={{ urlencode(request()->url()) }}"
                    target="_blank"
                    class="flex items-center gap-2 px-3 py-2 hover:bg-gray-600 rounded-lg"
                >
                    <span>Twitter</span>
                </a>
                
                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                    target="_blank"
                    class="flex items-center gap-2 px-3 py-2 hover:bg-gray-600 rounded-lg"
                >
                    <span>Facebook</span>
                </a>
                <button
                    @click="
                        navigator.clipboard.writeText(window.location.href);
                        $el.querySelector('span').textContent = 'Copied!';
                        setTimeout(() => $el.querySelector('span').textContent = 'Copy Link', 2000)
                    "
                    class="flex items-center gap-2 px-3 py-2 hover:bg-gray-600 rounded-lg w-full text-left"
                >
                    <span>Copy Link</span>
                </button>
            </div>
        </div>
    </div>
</div>