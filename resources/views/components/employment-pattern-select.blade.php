@foreach ($employmentPatterns as $employmentPattern)
    <label class="font-normal">
        <input
            type="radio"
            {!! $attributes->merge(['class' => 'radio']) !!}
            name="employment_pattern_id"
            value="{{ $employmentPattern->id }}"
            @checked(old("employment_pattern_id", $selected) == $employmentPattern->id)
            @disabled($disabled)
        >
        <span class="ml-1 mr-4">{{ $employmentPattern->name }}</span>
    </label>
@endforeach
