@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'px-4 py-2.5 text-gray-700 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 w-full']) }}>