@props(['active' => false, 'href' => '#'])

@php
    $classes = $active
        ? 'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-white bg-gray-800 dark:bg-gray-700'
        : 'flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 dark:hover:bg-gray-700';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
