<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', Rule::unique('posts')->ignore($this->route('post')->id)],
            'summary' => ['max:255'],
            'content' => ['required'],
            'categories' => ['required', 'string'],
            'publish' => ['string'],
        ];
    }

    public function authorize(): bool
    {
        $post = $this->route('post');
        return $post && $this->user()->can('update', $post);
    }
}
