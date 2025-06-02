<?php
declare(strict_types=1);


namespace App\Livewire\Modals\Student;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRandomMode;
use App\Enums\User\UserRole;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Validate;


trait HasStudentForm
{

    public string $full_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $date_of_birth = '';
    public int|null $group_id = null;
    public iterable $groups = [];
    public iterable $teachers = [];

    public function mountHasStudentForm(): void
    {

        $this->groups = Group::query()->pluck('name', 'id')->toArray();
//        $this->teachers = Teacher::query()->pluck('full_name', 'id')->toArray();
    }


    public function rules(): array
    {
        return [
            'full_name'     => [
                'required',
                'string',
                'max:200'
            ],
            'email'         => [
                'required',
                'email',
                'max:200',
                Rule::unique('users', 'email')->ignore($this->student ?? null)
            ],
            'password'      => [
                'required',
                'string',
                'min:8',
                'max:200',
                'confirmed'
            ],
            'group_id'      => [
                'required',
                'exists:groups,id'
            ],
            'date_of_birth' => [
                'nullable',
                'date',
            ]
        ];
    }

    public function loadModel(Student $student): void
    {
        $this->full_name = $student->full_name;
        $this->email = $student->email;
        $this->group_id = $student->group_id;
        $this->date_of_birth = $student->date_of_birth ? $student->date_of_birth->toDateString() : '';
    }
}
