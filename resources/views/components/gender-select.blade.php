@foreach ($genders as $gender)
    <label class="font-normal">
        <input
            type="radio"
            {!! $attributes->merge(['class' => 'radio']) !!}
            name="gender_id"
            value="{{ $gender->id }}"
            @checked(old("gender_id", $selected) == $gender->id)
            @disabled($disabled)
        >
        <span class="ml-1 mr-4">{{ $gender->name }}</span>
    </label>
@endforeach
