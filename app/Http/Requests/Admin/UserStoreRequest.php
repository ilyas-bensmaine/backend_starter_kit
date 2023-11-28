<?php

namespace App\Http\Requests\Admin;

use App\Rules\ArabicRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            "name" => ['sometimes', 'max:255'],
            "arabic_name" => ['sometimes', 'max:255', new ArabicRule],
            "email" => ['sometimes', 'required', 'unique:users', 'email'],
            "phone" => ['sometimes', 'required', 'unique:users', new PhoneRule],
            "status" => ['required', 'array'],
            "wilaya" => ['required', 'array'],
            "profession" => ['required', 'array'],
        ];
    }
}
