<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', Rule::unique('projects')->ignore($this->route('project')->id)],
            'summary' => ['max:255'],
            'content' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        $project = $this->route('project');
        return $project && $this->user()->can('update', $project);
    }
}
