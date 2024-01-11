@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'py-2 ripple bg-secondary text-white rounded'
                : 'py-2 ripple';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
