@props(['active' => false])

<a {{ $attributes->merge(['class' => 'rounded-xl px-3 py-2 ring-1 ring-transparent transition focus:outline-none ' . ($active ? 'bg-gray-300 text-gray-800' : '')]) }}>
    {{ $slot }}
</a>