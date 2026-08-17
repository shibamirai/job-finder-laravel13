<x-layout>
    <x-slot name="header">
        就職者さんのデータ・ポートフォリオ
    </x-slot>

    <div class="bg-white rounded-lg px-10 py-8">
        <x-job-finder.detail :jobFinder="$jobFinder" />
        <div class="flex justify-center">
            <a href="{{ route('portfolios.index') }}">
                <x-form.button class="rounded-full w-48 justify-center">
                    一覧へ戻る
                </x-form.button>
            </a>
        </div>
    </div>
</x-layout>
