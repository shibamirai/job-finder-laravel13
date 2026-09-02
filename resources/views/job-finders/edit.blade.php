<x-layout>
    <x-slot name="header">
        就職者さんデータ編集フォーム
    </x-slot>

    <x-tab>
        <x-tab.item :href="route('job-finders.edit', $jobFinder)" :active="!isset($workId)">
            {{ $jobFinder->name }}さんについて
        </x-tab.item>

@foreach ($jobFinder->works as $work)
        <x-tab.item :href="route('works.edit', [$jobFinder, $work])" :active="isset($workId) && $workId == $work->id">
            作品「{{ Str::limit($work->content, 10, '...') }}」
        </x-tab.item>
@endforeach

        <x-tab.item :href="route('works.create', $jobFinder)" :active="isset($workId) && $workId == 0">
            ポートフォリオ追加
        </x-tab.item>
    </x-tab>

@isset($workId)
    @if ($workId == 0)
        <x-work.form :jobFinder="$jobFinder" />
    @else
        <x-work.form :jobFinder="$jobFinder" :work="$jobFinder->works->find($workId)" />
    @endif
@else
    <x-job-finder.form :jobFinder="$jobFinder" />
@endisset
</x-layout>
