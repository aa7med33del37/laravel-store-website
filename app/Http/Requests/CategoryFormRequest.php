<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'unique:categories,name'
            ],
            'description' => [
                'nullable',
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:png,jpg, jpeg',
            ],
            'meta_title' => [
                'nullable',
                'string',
            ],
            'meta_keyword' => [
                'nullable',
                'string',
            ],
            'meta_description' => [
                'nullable',
                'string',
            ],
        ];
    }
}
