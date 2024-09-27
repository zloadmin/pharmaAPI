<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'full_name'             => ['description' => 'ФИО'],
            'password'              => ['description' => 'Пароль [Только для роли Admin]', 'example' => 'password'],
            'password_confirmation' => ['description' => 'Пароль подтверждение [Только для роли Admin]', 'example' => 'password'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'             => ['required', 'string', 'max:250'],
            'password'              => ['string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required_with:password']
        ];
    }
}
