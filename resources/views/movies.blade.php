<x-layout>
    <section class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="grid grid-cols-10 pt-8 pb-16 max-w-7xl mx-auto gap-6">
            <h2 class="text-xl font-bold text-gray-100 col-span-12">Filter</h2>
            <div class="col-span-2">
                <label for="category" class="block font-medium text-gray-400">Category</label>
                <div class="mt-1">
                    <select id="category" name="category" class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>All</option>
                        <option>Action</option>
                        <option>Adventure</option>
                        <option>Animation</option>
                        <option>Comedy</option>
                        <option>Crime</option>
                        <option>Drama</option>
                        <option>Family</option>
                        <option>Fantasy</option>
                        <option>History</option>
                        <option>Horror</option>
                        <option>Music</option>
                        <option>Mystery</option>
                        <option>Romance</option>
                        <option>Science Fiction</option>
                        <option>TV Movie</option>
                        <option>Thriller</option>
                        <option>War</option>
                        <option>Western</option>
                    </select>
                </div>
            </div>
            <div class="col-span-2">
                <label for="rating" class="block font-medium text-gray-400">Rating</label>
                <div class="mt-1">
                    <select id="rating" name="rating" class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>All</option>
                        <option>★</option>
                        <option>★★</option>
                        <option>★★★</option>
                        <option>★★★★</option>
                        <option>★★★★★</option>
                    </select>
                </div>
            </div>
            <div class="col-span-2">
                <label for="year" class="block font-medium text-gray-400">Year</label>
                <div class="mt-1">
                    <select id="year" name="year" class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>All</option>
                        <option>2021</option>
                        <option>2020</option>
                        <option>2019</option>
                        <option>2018</option>
                        <option>2017</option>
                        <option>2016</option>
                        <option>2015</option>
                        <option>2014</option>
                        <option>2013</option>
                        <option>2012</option>
                        <option>2011</option>
                        <option>2010</option>
                    </select>
                </div>
            </div>
            <div class="col-span-2">
                <label for="sort" class="block font-medium text-gray-400">Sort By</label>
                <div class="mt-1">
                    <select id="sort" name="sort" class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>Popularity</option>
                        <option>Rating</option>
                        <option>Release Date</option>
                    </select>
                </div>
            </div>
            <div class="col-span-2">
                <label for="sort" class="block font-medium text-gray-400">Quality</label>
                <div class="mt-1"> 
                    <select id="sort" name="sort" class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>All</option>
                        <option>HD</option>
                        <option>SD</option>
                    </select>
                </div>
            </div>
        </div>
        <h2 class="text-xl font-bold text-gray-100">Categories</h2>
        <div class="grid grid-cols-12 lg:grid-cols-10 gap-4 pt-6">
            @foreach($movies as $movie)
            <div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-2 flex flex-grow justify-center md:justify-start">
                <x-movie-card :movie="$movie" />
            </div>
            @endforeach
        </div>
    </section>
</x-layout>