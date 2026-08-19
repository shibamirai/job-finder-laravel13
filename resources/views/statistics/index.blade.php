<x-layout>

    <p class="text-center text-2xl text-gray-700 mt-4">
        のべ就職者数 {{ $total }}人
    </p>
    <p class="text-center text-2xl text-gray-700 mb-4">
        平均利用期間 {{ $daysAve }}日<span class="text-sm">(最短 {{ $daysMin }}日, 最長 {{ $daysMax }}日)</span>
    </p>

    <div x-data="{ open: 1 }" class="bg-white pb-8">
        <nav class="mx-auto mb-4 bg-gray-100">
            <ul class="flex text-center">
                <x-statistics.li :id=1>年齢分布</x-statistics.li>
                <x-statistics.li :id=2>雇用形態</x-statistics.li>
                <x-statistics.li :id=3>就職分野</x-statistics.li>
                <x-statistics.li :id=4>習得スキル</x-statistics.li>
                <x-statistics.li :id=5>性別</x-statistics.li>
                <x-statistics.li :id=6>障害</x-statistics.li>
            </ul>
        </nav>
        <div x-show="open === 1">
            <canvas id="ageChart"></canvas>
        </div>
        <div x-show="open === 2">
            <canvas id="employmentPatternChart"></canvas>
        </div>
        <div x-show="open === 3">
            <div style="height: 80vh; display:grid; justify-content: center">
                <canvas id="genreChart"></canvas>
            </div>
        </div>
        <div x-show="open === 4">
            <canvas id="skillChart"></canvas>
        </div>
        <div x-show="open === 5">
            <div style="height: 80vh; display:grid; justify-content: center">
                <canvas id="genderChart"></canvas>
            </div>
        </div>
        <div x-show="open === 6">
            <div style="height: 80vh; display:grid; justify-content: center">
                <canvas id="handicapChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const total = @js($total);
        const ages = @js($ages);
        const employmentPatterns = @js($employmentPatterns);
        const countIT = @js($countIT);
        const skills = @js($skills);
        const genders = @js($genders);
        const handicaps = @js($handicaps);
    </script>
    @vite(['resources/js/statistics.js'])
</x-layout>
