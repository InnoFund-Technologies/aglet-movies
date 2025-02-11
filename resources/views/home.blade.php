<x-layout>
    <header class="home-hero pt-12">
        <section class="h-96 relative text-white px-2 sm:px-6 lg:px-8 max-w-8xl mx-auto">
            <div class="place-self-center space-y-8 text-gray-50 pl-8 absolute top-0 ring-0 left-0 bottom-0 z-10">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-6xl xl:text-6xl dark:text-gray-50">
                    Welcome to <span class="text-[#FF2D20] font-black">Aglet</span> <span class="text-[#FF2D20] font-black">Movies</span>
                </h1>
                <p
                    class="max-w-2xl mb-6 font-light text-gray-300 lg:mb-8 md:text-lg lg:text-xl">
                    Watch your favorite movies and TV shows online for <span class="text-[#FF2D20]">free</span>.
                </p>
                <a href="#"
                    class="inline-flex items-center z-10 justify-center px-5 py-3 mr-3 gap-2 text-base font-medium text-center text-gray-700 duration-150 transition-all rounded-3xl bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Play now
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-800">
                        <path fillRule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clipRule="evenodd">
                    </svg>
                </a>
            </div>

            <div class="hero-overlay absolute bottom-0 right-0 left-0 h-44"></div>
        </section>
    </header>
    <main class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8 mb-12 pt-3 flex flex-col gap-12"> 
        <x-movie-section title="Trending Now" :movies="$trending" />
        <x-movie-section title="Popular Movies" :movies="$popular" />
        <x-movie-section title="Coming Soon" :movies="$upcoming" />
        <x-movie-section title="Now Playing" :movies="$nowPlaying" />
        <x-movie-section title="Top Rated" :movies="$topRated" /> 
    </main>

</x-layout>