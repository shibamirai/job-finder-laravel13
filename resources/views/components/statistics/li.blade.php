@props(['id'])

<li class="flex-1 py-2 rounded-t-md text-sm font-medium"
    :class="{
        'bg-white': open === {{ $id }},
        'bg-gray-200': open !== {{ $id }},
        'text-gray-400': open !== {{ $id }},
        'hover:text-gray-700': open !== {{ $id }}
    }"
    @@click="open = {{ $id }}"
>
    {{ $slot }}
</li>
