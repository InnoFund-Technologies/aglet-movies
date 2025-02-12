<button {{ $attributes->merge(['class' => 'inline-block bg-red-600 hover:bg-red-700 rounded-lg text-white px-3 py-2 text-sm font-medium cursor-pointer transition-colors duration-200']) }}>
    {{ $slot }}
</button>