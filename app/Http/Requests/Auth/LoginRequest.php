<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "id"=>"required|integer",
            "password"=>"required",
        ];
    }
    public function messages()
    {
        return[
            "id.integer"=>"Invalid Input!! Student ID must be in numerical format...{Eg,123,333}",
        ];
    }
}
