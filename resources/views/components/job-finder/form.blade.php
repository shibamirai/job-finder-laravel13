@props(['jobFinder' => null])

<div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8">
    <h1 class="text-xl text-cyan-500 text-center font-bold">利用者さんについて</h1>

@if ($jobFinder)
    <form action="{{ route('job-finders.store') }}" method="post" class="mt-4 space-y-4">
@else
    <form action="{{ route('job-finders.store') }}" method="post" class="mt-4 space-y-4">
@endif
        @csrf

        <x-form.job-finder label="アバターを選ぶ" name="avatar">
            <div class="flex flex-wrap items-center">
                <x-avator-select :selected="$jobFinder?->avatar" />
            </div>
        </x-form.job-finder>

        <x-form.job-finder label="名前" name="name">
            <input type="text" id="name" name="name"
                class="input"
                value="{{ old('name', $jobFinder?->name) }}"
                placeholder="非公開"
                autocomplete="name"
            >
        </x-form.job-finder>

        <x-form.job-finder label="性別" name="gender_id">
            <div class="flex flex-wrap items-center">
                <x-gender-select :selected="$jobFinder?->gender->id" />
            </div>
        </x-form.job-finder>

        <x-form.job-finder label="年齢" name="age">
            <input type="number" id="age" name="age"
                class="input w-auto mr-2"
                value="{{ old('age', $jobFinder?->age) }}"
            >歳
        </x-form.job-finder>

        <x-form.job-finder label="障害" name="handicaps">
            <div class="flex flex-wrap items-center">
                <x-handicap-select :selected="$jobFinder?->handicaps->pluck('id')->all()" />
            </div>
        </x-form.job-finder>

        <x-form.job-finder label="手帳有無" name="has_certificate">
            <div class="flex flex-wrap items-center">
                <label class="font-normal">
                    <input
                        type="checkbox"
                        class='checkbox'
                        name="has_certificate"
                        @checked(old('has_certificate', $jobFinder?->has_certificate))
                    >
                    <span class="ml-1 mr-4">手帳あり</span>
                </label>
            </div>
        </x-form.job-finder>

        <x-form.job-finder label="利用開始日" name="use_from">
            <input type="date" id="use_from" name="use_from"
                class="input w-auto mr-2"
                value="{{ old('use_from', $jobFinder?->use_from) }}"
            >
        </x-form.job-finder>

        <x-form.job-finder label="習得スキル" name="skills">
            <x-skill-input :selected="$jobFinder?->skills->pluck('name')->all()" />
        </x-form.job-finder>

        <h1 class="text-xl text-cyan-500 text-center font-bold mt-10">就職先について</h1>

        <x-form.job-finder label="職種" name="occupation">
            <x-occupation-input :selected="$jobFinder?->occupation->name" />
        </x-form.job-finder>

        <x-form.job-finder label="仕事内容" name="description">
            <input type="text" id="description" name="description"
                class="input"
                value="{{ old('description', $jobFinder?->description) }}"
                placeholder="システム開発、Webサイト構築など"
            >
        </x-form.job-finder>

        <x-form.job-finder label="就労開始日" name="hired_at">
            <input type="date" id="hired_at" name="hired_at"
                class="input w-auto mr-2"
                value="{{ old('hired_at', $jobFinder?->hired_at) }}"
            >
        </x-form.job-finder>

        <x-form.job-finder label="雇用形態" name="employment_pattern_id">
            <div class="flex flex-wrap items-center">
                <x-employment-pattern-select :selected="$jobFinder?->employmentPattern->id" />
            </div>
        </x-form.job-finder>

        <x-form.job-finder label="就労スタイル" name="is_handicaps_opened">
            <div class="flex flex-wrap items-center">
                <label class="font-normal">
                    <input
                        type="checkbox"
                        class='checkbox'
                        name="is_handicaps_opened"
                        @checked(old('is_handicaps_opened', $jobFinder?->is_handicaps_opened))
                    >
                    <span class="ml-1 mr-4">オープン就労</span>
                </label>
            </div>
        </x-form.job-finder>

        <div class="text-center mt-8">
            <x-form.button class="rounded-full w-36">登録</x-form.button> 
        </div>
    </form>
</div>
