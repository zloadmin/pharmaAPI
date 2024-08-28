<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

abstract class UpdateUserRequest extends FormRequest
{
    abstract public function getID(): ?int;

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
            'email'                 => ['required', 'email', Rule::unique('users')->ignore($this->getID())],
            'password'              => ['string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required_with:password']
        ];
    }
}
