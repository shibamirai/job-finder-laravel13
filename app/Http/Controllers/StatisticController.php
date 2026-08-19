<?php

namespace App\Http\Controllers;

use App\Models\EmploymentPattern;
use App\Models\Gender;
use App\Models\Handicap;
use App\Models\JobFinder;
use App\Models\Skill;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $jobFinders = JobFinder::with(['occupation'])->get();
        $total = $jobFinders->count();
        $daysOfUses = $jobFinders->map(fn ($jobFinder) => $jobFinder->days_of_use)->toArray();
        $daysAve = round(array_sum($daysOfUses) / count($daysOfUses));
        $daysMin = min($daysOfUses);
        $daysMax = max($daysOfUses);

        return view('statistics.index', [
            // のべ就職者数
            'total' => $total,
            // 平均利用期間
            'daysAve' => $daysAve,
            // 最短利用期間
            'daysMin' => $daysMin,
            // 最長利用期間
            'daysMax' => $daysMax,
            // 就職者年齢の配列
            'ages' => $jobFinders->map(fn ($jobFinder) => $jobFinder->age),
            // 雇用形態別人数
            'employmentPatterns' => EmploymentPattern::withCount('workers')->orderBy('sort')->get()->toArray(),
            // IT系職種の人数
            'countIT' => $jobFinders->filter(fn ($jobFinder) => $jobFinder->occupation->is_it)->count(),

            // スキル別人数
            'skills' => Skill::withCount(['masters'])->get()->toArray(),
            // 性別ごとの人数
            'genders' => Gender::withCount('workers')->orderBy('sort')->get()->toArray(),
            // 障害別人数
            'handicaps' => Handicap::withCount(['affects'])->orderBy('sort')->get()->toArray(),
            // 利用日数
            'days_of_uses' => $jobFinders->map(fn ($jobFinder) => $jobFinder->days_of_use),
        ]);
    }
}
