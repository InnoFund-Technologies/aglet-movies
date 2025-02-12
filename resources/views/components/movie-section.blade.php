@props(['title','movies'])

<section>
    <h2 class="text-2xl font-semibold text-[#FF2D20] flex gap-2 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flame">
            <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z" />
        </svg>
        {{ $title }}
    </h2>
    <div class="grid grid-cols-12 sm:grid-col-11 xl:grid-cols-10 gap-6 mt-8">
        @foreach($movies as $movie)
        <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-2 flex flex-grow justify-center md:justify-start">
            <x-movie-card :movie="$movie" />
        </div>
        @endforeach
    </div>
</section>