@props(['href', 'active'])

@php
$classes = "flex-1 py-2 rounded-t-md text-sm font-medium relative "
    . (($active ?? false) ? "bg-white" : "bg-gray-200 text-gray-400 hover:text-gray-700");
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{ $href }}" class="block">
        {{ $slot }}
    </a>
</li>
