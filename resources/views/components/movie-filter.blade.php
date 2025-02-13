<form class="grid grid-cols-12 pt-6 pb-12 md:pt-8 md:pb-16 max-w-7xl mx-auto gap-4 sm:gap-6 px-4 sm:px-6 lg:px-8">
    <h2 class="text-lg md:text-xl font-bold text-gray-100 col-span-12">Filter</h2>

    <!-- Filter Items -->
    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2">
        <label for="category" class="block text-sm md:text-base font-medium text-gray-400">Category</label>
        <div class="mt-1">
            <select
                id="category"
                name="category"
                wire:model="filters.category"
                class="px-4 py-2.5 text-gray-300 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 block w-44">
                @foreach($categories as $category)
                <option value="{{ $category === 'All' ? '' : $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2">
        <label for="rating" class="block text-sm md:text-base font-medium text-gray-400">Rating</label>
        <div class="mt-1">
            <select
                id="rating"
                name="rating"
                wire:model="filters.rating"
                class="px-4 py-2.5 text-gray-300 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 block w-44">
                @foreach($ratings as $rating)
                <option value="{{ $rating === 'All' ? '' : strlen($rating) }}">{{ $rating }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2">
        <label for="year" class="block text-sm md:text-base font-medium text-gray-400">Year</label>
        <div class="mt-1">
            <select
                id="year"
                name="year"
                wire:model="filters.year"
                class="px-4 py-2.5 text-gray-300 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 block w-44">
                @foreach($years as $year)
                <option value="{{ $year === 'All' ? '' : $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2">
        <label for="sort" class="block text-sm md:text-base font-medium text-gray-400">Sort By</label>
        <div class="mt-1">
            <select
                id="sort"
                name="sort"
                wire:model="filters.sort"
                class="px-4 py-2.5 text-gray-300 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 block w-44">
                @foreach($sortOptions as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2">
        <label for="quality" class="block text-sm md:text-base font-medium text-gray-400">Quality</label>
        <div class="mt-1">
            <select
                id="quality"
                name="quality"
                wire:model="filters.quality"
                class="px-4 py-2.5 text-gray-300 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 block w-44">
                @foreach($qualities as $quality)
                <option value="{{ $quality === 'All' ? '' : $quality }}">{{ $quality }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-2 flex items-end pb-1.5">
        <button
            type="submit"
            class="w-full bg-red-600 hover:bg-red-700 rounded-lg text-white px-4 py-2.5 md:py-2 text-sm md:text-base font-medium cursor-pointer transition-colors duration-200">
            Filter
        </button>
    </div>
</form>