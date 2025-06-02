<?php
declare(strict_types=1);


namespace App\Livewire\Modals\Teacher;


use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Validate;


trait HasTeacherForm
{

    public string $full_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int|null $group_id = null;
    public iterable $groups = [];

    public function mountHasTeacherForm(): void
    {

        $this->groups = Group::query()->pluck('name', 'id')->toArray();
    }


    public function rules(): array
    {
        return [
            'full_name'       => [
                'required',
                'string',
                'max:200'
            ],
            'email'           => [
                'required',
                'email',
                'max:200',
                Rule::unique('users', 'email')->ignore($this->teacher ?? null)
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:200',
                'confirmed'
            ],
            'group_id'        => [
                'required',
                'exists:groups,id'
            ],
        ];
    }

    public function loadModel(Teacher $teacher): void
    {
        $this->full_name = $teacher->full_name;
        $this->email = $teacher->email;
        $this->group_id = $teacher->group_id;
    }
}
