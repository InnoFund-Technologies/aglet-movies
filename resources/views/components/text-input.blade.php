@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter password']) }}>