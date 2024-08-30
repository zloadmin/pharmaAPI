<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'full_name'             => ['description' => 'ФИО', 'example' => 'Иванов Ивани Иванович'],
            'email'                 => ['description' => 'Email', 'example' => 'test@test.com'],
            'group_id'              => ['description' => 'ID группы', 'example' => 1],
            'password'              => ['description' => 'Пароль', 'example' => 'password'],
            'password_confirmation' => ['description' => 'Пароль подтверждение', 'example' => 'password'],
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
            'email'                 => ['required', 'email', Rule::unique('users')],
            'group_id'              => ['required', Rule::exists('groups', 'id')],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ];
    }
}
