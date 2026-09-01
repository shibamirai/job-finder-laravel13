<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'content' => 'required',
            'title' => 'nullable',
            'url' => 'nullable|url',
            'languages' => 'required',
            'creation_time' => 'nullable|integer',
            'description' => 'nullable',
        ];
    }
}
