<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'body' => ['required', 'string', 'max:10000'],
            'is_published' => 'sometimes',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Title is required'
        ];
    }
}
