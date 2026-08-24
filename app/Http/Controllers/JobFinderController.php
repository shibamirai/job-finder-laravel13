<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
