<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', Rule::unique('posts')],
            'summary' => ['max:255'],
            'content' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('create', Project::class);
    }
}
