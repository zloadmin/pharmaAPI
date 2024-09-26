<?php

namespace App\Http\Requests\Department;

use App\Enums\User\UserRole;
use Illuminate\Foundation\Http\FormRequest;


class StoreDepartmentRequest extends FormRequest
{


    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => 'Название кафедры', 'example' => 'Кафедра экономики и права'],
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
            'name' => ['required', 'string', 'max:250'],
        ];
    }
}
