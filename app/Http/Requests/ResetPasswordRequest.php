<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            "email" => "required|email|max:30|exists:users,email",
            "password" => "required|min:8|max:16|confirmed"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email required",
            "email" => "Enter a valid email",
            "max" => "It cannot be more than 30 characters",
            "password.required" => "Password required",
            "password.confirmed" => "Passwords do not match",
            "password.min" => "It cannot be less than 8 characters",
            "password.max" => "It cannot be more than 16 characters"
        ];
    }
}
