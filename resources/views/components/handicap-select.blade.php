@foreach ($handicaps as $handicap)
    <label class="font-normal">
        <input
            type="checkbox"
            {!! $attributes->merge(['class' => 'checkbox']) !!}
            name="handicaps[]"
            value="{{ $handicap->id }}"
            @checked(in_array($handicap->id, old('handicaps', $selected ?? [])))
            @disabled($disabled)
        >
        <span class="ml-1 mr-4">{{ $handicap->name }}</span>
    </label>
@endforeach
