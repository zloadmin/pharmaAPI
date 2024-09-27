<?php

namespace App\Http\Requests\Student;

use App\Enums\Student\EducationStatus;
use App\Enums\User\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentEducationStatusMultiplyRequest extends FormRequest
{
    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'education_status' => ['description' => 'Статус', 'example' => EducationStatus::random()],
            'students_ids'     => ['descriptions' => 'Список IDков студентов'],
            'students_ids.*'   => ['descriptions' => 'ID студента'],
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
            'education_status' => ['required', Rule::in(EducationStatus::values())],
            'students_ids'     => ['required', 'array'],
            'students_ids.*'   => ['required', 'integer']
            //            'students.*.id'    => ['required', Rule::exists('users', 'id')->where('role', UserRole::Student)]
        ];
    }
}
