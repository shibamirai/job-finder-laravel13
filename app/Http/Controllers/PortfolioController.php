<?php

namespace App\Http\Controllers;

use App\Models\JobFinder;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $jobFinders = JobFinder::withCount('works')
            ->with([
                'employmentPattern:id,name',
                'gender:id,name',
                'handicaps:name',
                'occupation:id,name',
                'skills:name',
            ])
            ->orderBy('hired_at', 'desc')
            ->paginate(12);
        return view('portfolios.index', [
            'jobFinders' => $jobFinders
        ]);
    }
}
