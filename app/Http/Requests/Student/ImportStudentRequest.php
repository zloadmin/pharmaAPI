<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ImportStudentRequest extends FormRequest
{


    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'import_file' => ['description' => 'Файл импорта'],
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
            'import_file' => ['required', 'file', 'max:102400', 'extensions:xlsx,xls']
        ];
    }
}
