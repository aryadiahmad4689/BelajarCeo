<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            "nama" => "required",
            "email" => "required|email"
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'A nama is required',
            'email.required'  => 'A email is required',
            'email.email' => "must format email"
        ];
    }

}
