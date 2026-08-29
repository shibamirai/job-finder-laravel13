@foreach ($items as $value)
    <label class="text-center mr-2">
        <img src="{{ asset('avatar/' . $value) }}" alt="avatar" class="w-16 rounded-full">
        <input
            type="radio"
            {!! $attributes->merge(['class' => 'radio']) !!}
            name="avatar"
            value="{{ $value }}"
            @checked(old("avatar", $selected) == $value)
            @disabled($disabled)
        >
    </label>
@endforeach
