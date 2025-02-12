@props(['active'])

@php
$classes = ($active ?? false)
    ? 'text-white px-3 py-2 text-sm font-medium cursor-pointer transition-colors duration-200 bg-gray-900 rounded-lg text-white'
    : 'text-gray-300 hover:text-white px-3 py-2 text-sm font-medium cursor-pointer transition-colors duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>