<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            "email" => "required|email|max:30|exists:users,email"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email required",
            "email" => "Enter a valid email",
            "max" => "It cannot be more than 30 characters"
        ];
    }
}
