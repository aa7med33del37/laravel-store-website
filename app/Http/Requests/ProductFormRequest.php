<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'unique:products,name',
            ],
            'slug' => [
                'unique:products,name',
            ],
            'brand' => [
                'required',
                'string',
            ],
            'small_description' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
                'string',
            ],
            'original_price' => [
                'required',
                'integer',
            ],
            'selling_price' => [
                'nullable',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
            ],
            'trading' => [
                'nullable',
            ],
            'status' => [
                'nullable',
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
            'image' => [
                'nullable',
            ],
        ];
    }
}
