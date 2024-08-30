<?php

namespace App\Http\Requests\Student;

use App\Enums\Student\EducationMode;
use App\Enums\User\UserRole;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends UpdateUserRequest
{
    public function getID(): ?int
    {
        return $this->route()->parameter('student')->id ?? null;
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
            'teacher_id'            => ['description' => 'ID преподавателя', 'example' => 2],
            'date_of_birth'         => ['description' => 'Дата рождения', 'example' => '19.02.1989'],
            'education_mode'        => ['description' => 'Режим обучения', 'example' => EducationMode::random()],
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
            'group_id'              => ['required', Rule::exists('groups', 'id')],
            'teacher_id'            => ['nullable', Rule::exists('users', 'id')->where('role', UserRole::Teacher)],
            'date_of_birth'         => ['required', 'date', 'date_format:d.m.Y'],
            'education_mode'        => ['required', Rule::in(EducationMode::values())],
            'password'              => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable']
        ];
    }
}
