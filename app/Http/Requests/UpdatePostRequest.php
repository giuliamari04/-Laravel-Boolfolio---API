<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:200', Rule::unique('posts')->ignore($this->post)],
            'body' => ['nullable'],
            'image' => ['nullable', 'image'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'technologies' =>['exists:technologies,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.unique' => 'Questo titolo esiste già',
            'image.image' => 'L\'immagine deve essere di tipo image'
        ];
    }
}
