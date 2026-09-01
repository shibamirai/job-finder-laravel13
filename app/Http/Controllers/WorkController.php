<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\JobFinder;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function create(JobFinder $jobFinder)
    {
        return view('job-finders.edit', [
            'jobFinder' => $jobFinder,
            'workId' => 0,
        ]);
    }

    public function store(JobFinder $jobFinder, WorkRequest $request)
    {
        $attributes = array_merge(
            $request->safe()->only([
                'content', 'title', 'url', 'languages', 'creation_time', 'description',
            ]),
            [
                'job_finder_id' => $jobFinder->id,
            ]
        );

        Work::create($attributes);

        return redirect(route('job-finders.edit', $jobFinder))->with('success', 'ポートフォリオを追加しました！');
    }
}
