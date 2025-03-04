<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "nik" => "required|regex:/^[0-9]+$/|unique:profiles,nik|digits:16",
            "email" => "required|email:rfc,dns",
            "name" => "required|max:255",
            "phone" => "required|min:12|max:13|regex:/^[0-9]+$/",
            "address" => "required|max:500",
            "password" => "required|min:6|max:32|confirmed",
        ];
    }
}
