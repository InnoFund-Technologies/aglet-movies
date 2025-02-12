<x-layout>
    <div class="p-6 sm:py-12">
        <div class="bg-gray-800 rounded-lg max-w-7xl w-full mx-auto p-6 sm:p-8">
            <div class="relative min-h-96 grid grid-cols-12">
                <!-- Movie Poster Column -->
                <div class="col-span-3">
                    <img
                        src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                        alt="{{ $movie['title'] }}"
                        class="rounded-lg shadow-lg w-full" />
                </div>

                <!-- Movie Information Column -->
                <div class="col-span-9 pl-6 sm:pl-12 text-gray-100">
                    <!-- Title and Release Year -->
                    <div class="mb-4">
                        <h2 class="text-2xl sm:text-3xl font-bold">{{ $movie['title'] }}</h2>
                        <p class="text-gray-400 mt-1">{{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }}</p>
                    </div>

                    <!-- Quick Stats Row -->
                    <div class="flex gap-6 mb-6 text-sm">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span>{{ number_format($movie['vote_average'], 1) }}/10</span>
                        </div>
                        <div>{{ $movie['runtime'] }} minutes</div>
                        <div>{{ implode(', ', array_column($movie['genres'], 'name')) }}</div>
                    </div>

                    <!-- Overview -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-2">Overview</h3>
                        <p class="text-gray-300 leading-relaxed">{{ $movie['overview'] }}</p>
                    </div>

                    <!-- Additional Details -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Details</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-gray-400">Status</dt>
                                    <dd>{{ $movie['status'] }}</dd>
                                </div>
                                <div>
                                    <dt class="text-gray-400">Budget</dt>
                                    <dd>${{ number_format($movie['budget']) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-gray-400">Revenue</dt>
                                    <dd>${{ number_format($movie['revenue']) }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Production</h3>
                            <dl class="space-y-2">
                                <div>
                                    <dt class="text-gray-400">Production Companies</dt>
                                    <dd>{{ implode(', ', array_column($movie['production_companies'], 'name')) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-gray-400">Release Date</dt>
                                    <dd>{{ \Carbon\Carbon::parse($movie['release_date'])->format('F j, Y') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Tagline -->
                    @if($movie['tagline'])
                    <div class="mt-6 italic text-gray-400">"{{ $movie['tagline'] }}"</div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Related Movies Section -->
        <div class="mt-12 max-w-7xl w-full mx-auto">
            <h2 class="text-2xl font-bold text-gray-100 mb-6">You may also like</h2>

            <!-- Scrollable Container for Related Movies -->
            <div class="relative">
                <!-- Gradient Fade Effect for Scroll Indication -->
                <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-gray-900 to-transparent z-10"></div>

                <!-- Horizontal Scrolling Grid -->
                <div class="grid grid-cols-12 gap-6">
                    <!-- Example of how to structure each related movie card -->
                    @foreach($related as $relateMovie)
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-3 flex flex-grow justify-center md:justify-start">
                        <x-movie-card :movie="$relateMovie" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</x-layout>