<div x-data="{
        skills: new Set(@js(old('skills', $selected))),
        newSkill: ''
    }"
    class="space-y-1"
>
    <template x-for="(skill) in skills" :key="skill">
        <div class="flex gap-x-2 items-center">
            <input name="skills[]" x-model="skill" class="input w-56 bg-gray-100" readonly>
            <button type="button" aria-label="Remove skill"
                class="form-muted-icon"
                @click="skills.delete(skill)"
            >
                <x-icons.close />
            </button>
        </div>
    </template>
    <div class="flex gap-x-2 items-center">
        <input id="new-skill"
            x-model="newSkill"
            placeholder="選択または入力（複数可）"
            class="input w-56"
            list="skill-list"
        >
        <datalist id="skill-list">
@foreach ($skills as $skill)
            <option value="{{ $skill->name }}" data-id="{{ $skill->id }}"></option>
@endforeach
        </datalist>
        <button type="button"
            class="form-muted-icon"
            @click="skills.add(newSkill.trim()); newSkill='';"
            :disabled="newSkill.trim().length === 0"
        >
            <x-icons.close class="rotate-45" />
        </button>
        <span class="font-bold text-red-600">（＋を押して確定）</span>
    </div>
</div>
