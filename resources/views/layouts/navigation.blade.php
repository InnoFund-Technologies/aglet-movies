<nav x-data="{ open: false }" class="sticky top-0 inset-x-0 z-50 transition-all duration-300 bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-8xl w-full px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between w-full gap-x-4 pl-2 sm:pl-0">
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

                <x-nav-link href="{{ route('contact.create') }}" :active="request()->is('contact')">
                    Contact
                </x-nav-link>
            </div>

            {{-- Search Bar --}}
            <div class="flex-1 max-w-lg">
                <x-dropdown align="right" width="full" contentClasses="h-64 bg-gray-800 text-gray-50 px-4 py-3 shadow-lg ring-1 ring-gray-700 ring-opacity-60">
                    <x-slot name="trigger">
                        <form class="relative" @submit.prevent method="get">
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input
                                    type="text"
                                    class="px-4 py-2.5 text-gray-50 rounded-lg pl-11 placeholder:text-gray-400 bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 w-full"
                                    placeholder="Search movies and TV shows..."
                                    @input.debounce.300ms="search($event.target.value)"
                                    @click.outside="searchResults = []">
                            </div>
                        </form>
                    </x-slot>
                    <x-slot name="content">
                        Search Results
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- User Navigation --}}
            <div class="flex items-center space-x-4">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <x-nav-link href="{{ route('login') }}" :active="request()->is('login')">
                    Login
                </x-nav-link>
                <x-nav-link href="{{ route('register') }}" :active="request()->is('register')" class="bg-red-600 hover:text-white text-gray-50 hover:bg-red-700 rounded-lg">
                    Register
                </x-nav-link>
                @endauth

                <!-- Hamburger -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-gray-300 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <!-- Responsive Settings Options -->
            <div class="py-4 border-t border-gray-700 px-3">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()?->name ?? 'Guest' }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <div class="space-y-1">
                    <x-nav-link :href="route('profile.edit')">
                        Profile
                    </x-nav-link>
                    <x-nav-link href="{{ route('home') }}" :active="request()->is('home')" class="block">
                        Home
                    </x-nav-link>
                    <x-nav-link href="{{ route('movies.index') }}" :active="request()->is('movies')" class="block">
                        Movies
                    </x-nav-link>
                    <x-nav-link href="{{ route('tv-shows.index') }}" :active="request()->is('tv-shows')" class="block">
                        TV Shows
                    </x-nav-link>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                </div>
            </div>
        </div>
</nav>