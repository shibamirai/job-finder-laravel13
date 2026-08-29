<?php

namespace App\View\Components;

use App\Models\Handicap;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HandicapSelect extends Component
{
    public array $selected;
    public bool $disabled;

    public function __construct($selected = null, $disabled = false)
    {
        $this->selected = $selected ?: [];
        $this->disabled = $disabled;
    }

    public function render(): View|Closure|string
    {
        return view('components.handicap-select', [
            'handicaps' => Handicap::orderBy('sort', 'asc')->get(['id', 'name'])
        ]);
    }
}
