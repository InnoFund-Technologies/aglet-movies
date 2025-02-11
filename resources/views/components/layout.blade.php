<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aglet movies</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-100 bg-gray-900">
    <nav class="{{ request()->is(patterns: '/') ? 'bg-transparent' : 'bg-gray-800' }} sticky mb-6 top-0 inset-x-0 z-50">
        <div class="mx-auto max-w-8xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-around">
                <div class="flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block">
                        <div class="flex gap-4">
                            <x-nav-link href="/" :active="request()->is('/')" aria-current="page">Home</x-nav-link>
                            <x-nav-link href="contact" :active="request()->is('contact')">Contact</x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <form class="rounded-xl pl-3 h-11 mx-auto relative w-fit">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 absolute inset-y-2 left-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input placeholder="Search here..." id="search-movies"
                            class="w-96 border-none black focus:outline-0 pl-12 focus:bg-gray-50 {{ request()->is( '/') ? 'bg-white/50 hover:bg-gray-50 ' : 'bg-gray-800' }} flex-1 py-2 text-gray-800 placeholder:text-gray-600 rounded-xl">
                    </form>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="flex items-center gap-4">
                        <x-nav-link href="{{ route('register') }}" :active="request()->is('/register')">
                            Register
                        </x-nav-link>
                        {{-- Logout Button --}}
                        <form method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center py-2 rounded-xl pl-4 pr-2 gap-2 text-gray-800 bg-white h-11">
                                Logout
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-800">
                                    <path fillRule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clipRule="evenodd" />
                                </svg>
                            </button>
                        </form>
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center py-2 rounded-xl pl-4 pr-2 gap-2 text-gray-800 bg-white h-11">
                            Login
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-800">
                                <path fillRule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clipRule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="block rounded-xl bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
                <a href="#" class="block rounded-xl px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
            </div>
        </div>
    </nav>
    {{ $slot }}
</body>

</html>