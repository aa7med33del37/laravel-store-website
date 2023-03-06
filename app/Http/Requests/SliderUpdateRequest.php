<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'title'        => ['string', 'required'],
            'description'  => ['string', 'nullable'],
            'image'        => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'status'       => ['nullable'],
        ];
    }
}
