<input id="occupation"
    name="occupation"
    placeholder="選択または入力"
    class="input"
    list="occupation-list"
    value="{{ old('occupation', $selected) }}"
>
<datalist id="occupation-list">
@foreach ($occupations as $occupation)
    <option value="{{ $occupation->name }}" data-id="{{ $occupation->id }}"></option>
@endforeach
</datalist>
