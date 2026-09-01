<x-layout>
    <x-slot name="header">
        就職者さんデータ編集フォーム
    </x-slot>

    <x-tab>
        <x-tab.item :href="route('job-finders.edit', $jobFinder)" :active="!isset($workId)">
            {{ $jobFinder->name }}さんについて
        </x-tab.item>

        <x-tab.item :href="route('works.create', $jobFinder)" :active="isset($workId) && $workId == 0">
            ポートフォリオ追加
        </x-tab.item>
    </x-tab>

@isset($workId)
    <x-work.form :jobFinder="$jobFinder" />
@else
    <x-job-finder.form :jobFinder="$jobFinder" />
@endif
</x-layout>