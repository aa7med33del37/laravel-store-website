<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class placeOrderRequest extends FormRequest
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
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|integer|max:11',
            'pincode' => 'nullable|integer',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
        ];
    }
}
