<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobFinderRequest;
use App\Models\JobFinder;
use App\Models\Occupation;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobFinderController extends Controller
{
    public function index()
    {
        $jobFinders = JobFinder::with([
                'employmentPattern:id,name',
                'gender:id,name',
                'occupation:id,name'
            ])
            ->orderBy('hired_at', 'desc')
            ->orderBy('id')
            ->filter(request(['search']))
            ->paginate(12)
            ->withQueryString();
        foreach ($jobFinders as $jobFinder) {
            $jobFinder->setAppends([
                'hired',
                'period_of_use'
            ]);
        }
        return view('job-finders.index', [
            'jobFinders' => $jobFinders
        ]);
    }

    public function create()
    {
        return view('job-finders.create');
    }

    public function store(JobFinderRequest $request)
    {
        DB::beginTransaction();
        try {
            // 入力された職種をDBから取得、なければ追加
            $occupation = Occupation::firstOrCreate([
                'name' => $request->safe()->occupation
            ]);

            // 就職者を新規作成
            $attributes = $request->safe()
                ->merge([
                    'occupation_id' => $occupation->id,
                    'has_certificate' => $request->boolean('has_certificate'),
                    'is_handicaps_opened' => $request->boolean('is_handicaps_opened')
                ])
                ->except(['skills', 'occupation', 'handicaps']);
            $jobFinder = JobFinder::create($attributes);

            // 作成した就職者の障害を更新
            $jobFinder->handicaps()->sync($request->safe()->only('handicaps')['handicaps']);

            // 入力された習得スキルをDBから取得、なければ追加
            $skill_ids = [];
            foreach ($request->safe()->skills ?? [] as $skillName) {
                $skill = Skill::firstOrCreate([
                    'name' => $skillName
                ]);
                $skill_ids[] = $skill->id;
            }
            // JobFinder と Skill の関連を作り直す
            $jobFinder->skills()->sync($skill_ids);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('success', '登録に失敗しました');
        }

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを追加しました！');
    }

    public function edit(JobFinder $jobFinder)
    {
        $jobFinder->load([
            'skills:name',
            'employmentPattern:id,name',
            'gender:id,name',
            'handicaps:id',
            'occupation:id,name',
            'works'
        ]);

        return view('job-finders.edit', [
            'jobFinder' => $jobFinder,
        ]);
    }

    public function update(JobFinderRequest $request, JobFinder $jobFinder)
    {
        DB::beginTransaction();
        try {
            // 入力された職種をDBから取得、なければ追加
            $occupation = Occupation::firstOrCreate([
                'name' => $request->safe()->occupation
            ]);

            // 就職者を更新
            $attributes = $request->safe()
                ->merge([
                    'occupation_id' => $occupation->id,
                    'has_certificate' => $request->boolean('has_certificate'),
                    'is_handicaps_opened' => $request->boolean('is_handicaps_opened')
                ])
                ->except(['skills', 'occupation', 'handicaps']);
            $jobFinder->updateOrFail($attributes);

            // 就職者の障害を更新
            $jobFinder->handicaps()->sync($request->safe()->only('handicaps')['handicaps']);

            // 入力された習得スキルをDBから取得、なければ追加
            $skill_ids = [];
            foreach ($request->safe()->skills ?? [] as $skillName) {
                $skill = Skill::firstOrCreate([
                    'name' => $skillName
                ]);
                $skill_ids[] = $skill->id;
            }
            // JobFinder と Skill の関連を作り直す
            $jobFinder->skills()->sync($skill_ids);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('success', '更新に失敗しました');
        }

        return redirect(route('job-finders.edit', $jobFinder))->with('success', $jobFinder->name .'さんを更新しました！');
    }

    public function destroy(JobFinder $jobFinder)
    {
        try {
            DB::transaction(function () use ($jobFinder) {
                $jobFinder->handicaps()->detach();
                $jobFinder->skills()->detach();
                $jobFinder->deleteOrFail();
            });
        } catch (Exception $e) {
            return back()->with('success', $jobFinder->name .'さんの削除に失敗しました');
        }

        return back()->with('success', $jobFinder->name .'さんを削除しました！');
    }
}
