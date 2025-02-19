<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => 'required|string',
            'image' => 'nullable|string',
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags' => '',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Sarlavha kiritish majburiy!',
            'title' => 'Sarlavha kamida :min ta belgidan iborat bo‘lishi kerak.',
            'content.required' => 'Maqola matni kiritish majburiy!',
            'category_id.required' => 'Kategoriya tanlash majburiy!',
            'category_id' => 'Tanlangan kategoriya mavjud emas!',
        ];
    }

}
