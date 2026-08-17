<div class="col-span-2 mx-4 mb-6">
    <p class="text-gray-600 text-sm font-semibold">{{ date('Y年m月', strtotime($jobFinder->hired_at)) }}</p>

    <div class="bg-white rounded-2xl px-6 py-6">
        <header class="flex items-center">
            <img src="{{ asset('avatar/' . $jobFinder->avatar) }}" alt="" class="rounded-full mr-4 w-16 border border-gray-200">
            <div>
                <p class="text-sm">{{ $jobFinder->age }}歳 {{ $jobFinder->gender->name }}</p>
                <p class="text-xl font-bold text-cyan-500 tracking-wider">{{ $jobFinder->occupation->name }}</p>
                <p class="text-sm">{{ Str::limit($jobFinder->description, 32, '...') }}</p>
            </div>
        </header>

        <div class="mt-6 text-sm">
            <table class="w-full">
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">障害</th>
                    <td>
                        {{ join(", ", $jobFinder->handicaps->map(fn ($item) => $item->name)->all()) }}
                        (手帳{{ $jobFinder->has_certificate ? 'あり' : 'なし'}})
                    </td>
                </tr>
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">利用期間</th>
                    <td>{{ $jobFinder->period_of_use }}</td>
                </tr>
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">習得スキル</th>
                    <td>{{ join(", ", $jobFinder->skills->map(fn ($item) => $item->name)->all()) }}</td>
                </tr>
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">雇用形態</th>
                    <td>
                        {{ $jobFinder->employmentPattern->name }}
                        ({{ $jobFinder->is_handicaps_opened ? 'オープン' : 'クローズ' }}就労)
                    </td>
                </tr>
            </table>
        </div>

        <a href="{{ route('portfolios.show', $jobFinder->id) }}">
            @if ($jobFinder->works_count > 0)
                <x-form.button class="rounded-full w-full justify-center mt-8">ポートフォリオを見る</x-form.button>
            @else
                <x-form.button class="rounded-full w-full justify-center mt-8" disabled>ポートフォリオを見る</x-form.button>
            @endif
        </a>
    </div>
</div>
