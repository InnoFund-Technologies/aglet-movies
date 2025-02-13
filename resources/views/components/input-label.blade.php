@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-400 mb-2 block']) }}>
    {{ $value ?? $slot }}
</label>
