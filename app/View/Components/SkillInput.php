<?php

namespace App\View\Components;

use App\Models\Skill;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SkillInput extends Component
{
    public array $selected;

    public function __construct($selected = null)
    {
        $this->selected = $selected ?: [];
    }

    public function render(): View|Closure|string
    {
        return view('components.skill-input', [
            'skills' => Skill::get(['id', 'name'])
        ]);
    }
}
