<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class AvatorSelect extends Component
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
        $files = File::files(public_path('avatar'));

        return view('components.avator-select', [
            'items' => array_map(
                fn ($file) => $file->getFilename(), $files
            )
        ]);
    }
}
