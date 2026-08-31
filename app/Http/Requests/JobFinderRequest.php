<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobFinderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'avatar' => 'required',
            'name' => ['required', Rule::unique('job_finders')->ignore($this->jobFinder)],
            'gender_id' => 'required',
            'age' => 'required|integer|between:18,65',
            'handicaps' => 'nullable',
            'has_certificate' => 'nullable',
            'use_from' => 'required',
            'skills' => 'nullable',
            'occupation' => 'required',
            'description' => 'nullable',
            'hired_at' => 'required',
            'employment_pattern_id' => 'required',
            'is_handicaps_opened' => 'nullable',
        ];
    }
}
