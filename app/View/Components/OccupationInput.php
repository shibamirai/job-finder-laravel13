<?php

namespace App\View\Components;

use App\Models\Occupation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OccupationInput extends Component
{
    public string $selected;

    public function __construct($selected = null)
    {
        $this->selected = $selected ?: '';
    }

    public function render(): View|Closure|string
    {
        return view('components.occupation-input', [
            'occupations' => Occupation::get(['id', 'name'])
        ]);
    }
}
