<div
    x-data="searchMovies()"
    class="flex-1 max-w-lg mx-4">
    <x-dropdown align="right" width="full" contentClasses="max-w-lg bg-gray-800 shadow-lg text-gray-100 overflow-y-auto max-h-80">
        <x-slot name="trigger">
            <form class="relative" @submit.prevent>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input
                        type="text"
                        x-model="search"
                        x-ref="searchInput"
                        @input.debounce.300ms="getSearchResults()"
                        @click.outside="searchResults = []"
                        class="px-4 py-2.5 pl-11 text-gray-50 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 w-full placeholder:text-gray-400"
                        placeholder="Search movies and TV shows...">
                </div>
            </form>
        </x-slot>

        <x-slot name="content">
            <template x-if="isLoading">
                <div class="flex justify-center items-center h-full">
                    <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </template>

            <template x-if="!isLoading && searchResults.length > 0">
                <div class="space-y-4">
                    <template x-for="result in searchResults" :key="result.id">
                        <a :href="`/movies/${result.id}`" class="flex items-start space-x-4 p-4 hover:bg-gray-700 rounded-lg transition-colors duration-200">
                            <img
                                :src="result.poster_path ? `https://image.tmdb.org/t/p/w92${result.poster_path}` : '/images/no-poster.jpg'"
                                :alt="result.title || result.name"
                                class="w-14 h-auto object-cover rounded">
                            <div>
                                <p
                                    class="text-sm font-semibold hover:text-blue-400"
                                    x-text="result.title || result.name"></p>
                                <p class="text-gray-400" x-text="result.release_date ? `Released: ${result.release_date}` : ''"></p>
                                <span class="bg-[#FF2D20] text-white px-2 py-1 rounded-full text-xs">
                                    {{ number_format($result['vote_average'] ?? 0, 1) }} ★
                                </span>
                            </div>
                        </a>
                    </template>
                </div>
            </template>

            <template x-if="!isLoading && searchResults.length === 0 && search !== ''">
                <div class="text-center py-8 text-gray-400">
                    No results found for your search.
                </div>
            </template>
        </x-slot>
    </x-dropdown>
</div>