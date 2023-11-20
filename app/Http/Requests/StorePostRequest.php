<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', Rule::unique('posts')],
            'summary' => ['max:255'],
            'content' => ['required'],
            'categories' => ['required', 'string'],
            'publish' => ['string'],
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('create', Post::class);
    }
}
