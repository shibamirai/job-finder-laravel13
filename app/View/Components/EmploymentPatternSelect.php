<?php

namespace App\View\Components;

use App\Models\EmploymentPattern;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmploymentPatternSelect extends Component
{
    public string $selected;
    public bool $disabled;

    public function __construct($selected = null, $disabled = false)
    {
        $this->selected = $selected ?: '';
        $this->disabled = $disabled;
    }

    public function render(): View|Closure|string
    {
        return view('components.employment-pattern-select', [
            'employmentPatterns' => EmploymentPattern::orderBy('sort', 'asc')->get(['id', 'name'])
        ]);
    }
}
