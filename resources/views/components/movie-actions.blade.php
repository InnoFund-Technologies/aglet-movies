
<div>
    @auth
        <div class="bg-gray-800 rounded-lg p-4 mt-4">
            <div class="flex items-center gap-6">
                {{-- Like Button --}}
                <button
                    wire:click="toggleLike"
                    class="flex items-center gap-2 text-sm font-medium {{ $isLiked ? 'text-red-500' : 'text-gray-400' }} hover:text-red-500 transition-colors"
                    wire:loading.class="opacity-50"
                    wire:target="toggleLike"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-5 w-5 {{ $isLiked ? 'fill-current' : 'fill-none' }} stroke-current" 
                        viewBox="0 0 24 24" 
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>{{ $isLiked ? 'Liked' : 'Like' }}</span>
                </button>

                {{-- Error Message for Like --}}
                @error('like') 
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                {{-- Rest of your buttons... --}}
            </div>
        </div>
    @else
        <div class="bg-gray-800 rounded-lg p-4 mt-4">
            <a href="{{ route('login', ['redirect' => request()->fullUrl()]) }}" 
               class="text-blue-500 hover:text-blue-400">
                Log in to interact with this {{ $type }}
            </a>
        </div>
    @endauth
</div>