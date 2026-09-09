@props(['label'=> false, 'name', 'type' => 'text', 'value' => ''])

<div class="space-y-1">
    @if ($label)
        <label for="{{ $name }}" class="label">{{ $label }}</label>
    @endif

    @if ($type === 'textarea')
        <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            class="textarea"
            {{ $attributes }}
        >{{ old($name, $value) }}</textarea>
    @elseif ($type === 'select')
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            class="select"
            {{ $attributes }}
        >
            {{ $slot }}
        </select>
    @elseif ($type === 'checkbox')
        <lable class="label flex items-center gap-2">
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                class="checkbox"
                @checked(old($name, $value))
                {{ $attributes }}
            >{{ $slot }}
        </label>
    @else
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            class="input"
            value="{{ old($name, $value) }}"
            {{ $attributes }}>
    @endif

    <x-form.error name="{{ $name }}" />
</div>