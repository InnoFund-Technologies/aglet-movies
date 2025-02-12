 <form class="grid grid-cols-12 pt-8 pb-16 max-w-7xl mx-auto gap-6">
     <h2 class="text-xl font-bold text-gray-100 col-span-12">Filter</h2>

     <div class="col-span-2">
         <label for="category" class="block font-medium text-gray-400">Category</label>
         <div class="mt-1">
             <select
                 id="category"
                 name="category"
                 wire:model="filters.category"
                 class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                 @foreach($categories as $category)
                 <option value="{{ $category === 'All' ? '' : $category }}">{{ $category }}</option>
                 @endforeach
             </select>
         </div>
     </div>

     <div class="col-span-2">
         <label for="rating" class="block font-medium text-gray-400">Rating</label>
         <div class="mt-1">
             <select
                 id="rating"
                 name="rating"
                 wire:model="filters.rating"
                 class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                 @foreach($ratings as $rating)
                 <option value="{{ $rating === 'All' ? '' : strlen($rating) }}">{{ $rating }}</option>
                 @endforeach
             </select>
         </div>
     </div>

     <div class="col-span-2">
         <label for="year" class="block font-medium text-gray-400">Year</label>
         <div class="mt-1">
             <select
                 id="year"
                 name="year"
                 wire:model="filters.year"
                 class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                 @foreach($years as $year)
                 <option value="{{ $year === 'All' ? '' : $year }}">{{ $year }}</option>
                 @endforeach
             </select>
         </div>
     </div>

     <div class="col-span-2">
         <label for="sort" class="block font-medium text-gray-400">Sort By</label>
         <div class="mt-1">
             <select
                 id="sort"
                 name="sort"
                 wire:model="filters.sort"
                 class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                 @foreach($sortOptions as $value => $label)
                 <option value="{{ $value }}">{{ $label }}</option>
                 @endforeach
             </select>
         </div>
     </div>

     <div class="col-span-2">
         <label for="quality" class="block font-medium text-gray-400">Quality</label>
         <div class="mt-1">
             <select
                 id="quality"
                 name="quality"
                 wire:model="filters.quality"
                 class="w-full h-11 px-4 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500">
                 @foreach($qualities as $quality)
                 <option value="{{ $quality === 'All' ? '' : $quality }}">{{ $quality }}</option>
                 @endforeach
             </select>
         </div>
     </div>
     <div class="col-span-2 flex items-end pb-1.5">
         <button
             type="submit"
             class="bg-red-600 hover:bg-red-700 rounded-lg ext-white px-3 py-2 text-sm font-medium cursor-pointer transition-colors duration-200 text-white">
             Filter
         </button> 
     </div>
 </form>