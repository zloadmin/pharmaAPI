<?php

namespace App\Http\Requests\Group;

use App\Enums\User\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGroupRequest extends FormRequest
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
            'name'        => ['description' => 'Название группы', 'example' => 'Группа 1'],
            'description' => ['description' => 'Описание группы', 'example' => 'текст'],
            'teacher_id'  => ['description' => 'ID преподователя', 'example' => 2],
            'students'    => ['description' => 'Список учеников'],
            'students.*'  => ['description' => 'ID ученика', 'example' => 3],
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
            'name'        => ['required', 'string', 'max:250'],
            'description' => ['required'],
            'teacher_id'  => ['required', 'integer', Rule::exists('users', 'id')->where('role', UserRole::Teacher)],
            'students'    => ['array'],
            'students.*'  => ['required', 'integer', Rule::exists('users', 'id')->where('role', UserRole::Student)]
        ];
    }
}
