<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:3', 'max:255'],
            'content' => 'string',
            'image' => 'nullable|string',
            'category_id' => ['integer', 'exists:categories,id'],
            'page' => '',
            'per_page' => '',
//            'tags' => '',
        ];
    }


}
