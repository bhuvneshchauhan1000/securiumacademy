@props(['label'])

<div {{ $attributes->merge(['class' => 'mt-6 mb-1 px-3 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400']) }}>
    {{ $label }}
</div>
