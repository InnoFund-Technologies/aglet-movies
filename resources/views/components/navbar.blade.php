<nav
    class="sticky top-0 inset-x-0 z-50 transition-all duration-300 bg-gray-800"
    x-data="{ 
        scrolled: false,
        }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })">
    <div class="mx-auto max-w-8xl w-full px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between w-full">

            {{-- Desktop Navigation --}}
            <div class="hidden sm:flex items-center space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->is('/')">
                    Home
                </x-nav-link>
                <x-nav-link href="{{ route('movies.index') }}" :active="request()->is('movies')">
                    Movies
                </x-nav-link>
                <x-nav-link href="{{ route('tv-shows.index') }}" :active="request()->is('tv-shows')">
                    TV Shows
                </x-nav-link>
                <x-nav-link href="{{ route('contact.show') }}" :active="request()->is('contact.show')">
                    Contact
                </x-nav-link>
            </div>

            {{-- Search Bar --}}
            <div class="flex-1 max-w-lg mx-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <form class="relative" @submit.prevent method="get">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input
                                    type="text"
                                    class="w-full h-11 pl-10 pr-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                                    placeholder="Search movies and TV shows..."
                                    @input.debounce.300ms="search($event.target.value)"
                                    @click.outside="searchResults = []">
                            </div>
                        </form>
                    </x-slot>
                    <x-slot name="content">
                        <x-search-results />
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- User Navigation --}}
            <div class="flex items-center space-x-4">
                @auth
                <x-nav-link href="{{ route('watchlist') }}" :active="request()->is('watchlist')">
                    My List
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Logout
                    </button>
                </form>
                @else
                <x-nav-link href="{{ route('login') }}" :active="request()->is('login')">
                    Login
                </x-nav-link>
                <x-nav-link href="{{ route('register') }}" :active="request()->is('register')" class="bg-red-600 hover:bg-red-700 rounded-lg">
                    Register
                </x-nav-link>
                @endauth
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="sm:hidden" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-800">
            <x-nav-link href="{{ route('home') }}" :active="request()->is('home')" class="block">
                Home
            </x-nav-link>
            <x-nav-link href="{{ route('movies.index') }}" :active="request()->is('movies')" class="block">
                Movies
            </x-nav-link>
            <x-nav-link href="{{ route('tv-shows.index') }}" :active="request()->is('tv-shows')" class="block">
                TV Shows
            </x-nav-link>
            @auth
            <x-nav-link href="{{ route('watchlist') }}" :active="request()->is('watchlist')" class="block">
                My List
            </x-nav-link>
            @endauth
        </div>
    </div>
</nav>
</div>