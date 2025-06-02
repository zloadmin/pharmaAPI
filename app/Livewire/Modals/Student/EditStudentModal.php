<?php

namespace App\Livewire\Modals\Student;

use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditStudentModal extends Component
{
    use HasStudentForm;
    use HasEvents;

    public Student $student;

    public function mount(int $studentId): void
    {
        $this->student = Student::findOrFail($studentId);
        $this->loadModel($this->student);
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
                'nullable',
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

    public function render()
    {
        return view('livewire.modals.student.edit-student-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->updateStudent();
        $this->hideModal();
        $this->refreshStudentsTable();
    }

    private function updateStudent(): void
    {
        $this->student->full_name = $this->full_name;
        $this->student->email = $this->email;
        $this->student->group_id = $this->group_id;
        $this->student->date_of_birth = $this->date_of_birth ?: null;
        if ($this->password) {
            $this->student->password = Hash::make($this->password);
        }
        $this->student->save();
    }


}
