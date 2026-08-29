@props(['label', 'name'])

<fieldset>
    <div class="md:grid md:grid-cols-6 items-center">
        <legend for="{{ $name }}" class="legend">{{ $label }}</legend>

        <div class="col-span-5">
            {{ $slot }}
        </div>

        <x-form.error name="{{ $name }}" class="col-start-2 col-span-5" />
    </div>
</fieldset>
