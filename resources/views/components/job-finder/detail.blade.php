@props(['jobFinder', 'editing' => false])

<div class="lg:flex border border-white">
    <div class="flex-1 lg:px-10 py-8">
        <div class="pl-4">
            @if ($editing)
                <div class="flex items-center">
                    <img src="{{ asset('avatar/' . $jobFinder->avatar) }}" alt=""
                        class="rounded-full mr-4 w-16 border border-gray-200">
                    <div>
                        <div class="flex items-center">
                            <p class="text-xl font-bold mr-4">{{ $jobFinder->name }}</p>
                            <p class="text-sm">{{ $jobFinder->age }}歳 {{ $jobFinder->gender->name }}</p>
                        </div>
                        <p class="text-xl font-bold text-cyan-500 tracking-wider">{{ $jobFinder->occupation->name }}</p>
                    </div>
                </div>
            @else
                <img src="{{ asset('avatar/' . $jobFinder->avatar) }}" alt=""
                    class="rounded-full w-48 border-4 border-gray-500">
                <p class="relative left-14">{{ $jobFinder->age }}歳 {{ $jobFinder->gender->name }}</p>
                <p class="text-2xl font-bold text-cyan-500 tracking-wider py-1">{{ $jobFinder->occupation->name }}</p>
            @endif
            <p class="">{{ $jobFinder->description }}</p>
        </div>
        <div class="mt-6">
            <table class="w-full">
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">障害</th>
                    <td>
                        {{ join(", ", $jobFinder->handicaps->map(fn ($item) => $item->name)->all()) }}
                        (手帳{{ $jobFinder->has_certificate ? 'あり' : 'なし' }})
                    </td>
                </tr>
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">利用期間</th>
                    <td>{{ $jobFinder->periodOfUse }}</td>
                </tr>
                <tr class="border-y-2 border-gray-200">
                    <th class="text-left font-bold px-4 py-2">就職時期</th>
                    <td>{{ $jobFinder->hired }}</td>
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
    </div>
    <div class="flex-1 lg:px-10 py-8">
        @foreach ($jobFinder->works as $work)
            <x-work :work="$work" />
        @endforeach
    </div>
</div>