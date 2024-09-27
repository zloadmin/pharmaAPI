<?php

namespace App\Http\Requests\Student;

use App\Enums\Student\EducationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentEducationStatusRequest extends FormRequest
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
        ];
    }
}
