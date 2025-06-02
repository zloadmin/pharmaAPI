<?php

namespace App\Livewire\Modals\Teacher;

use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditTeacherModal extends Component
{
    use HasTeacherForm;
    use HasEvents;

    public Teacher $teacher;

    public function mount(int $teacherId): void
    {
        $this->teacher = Teacher::findOrFail($teacherId);
        $this->loadModel($this->teacher);
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:200'
            ],
            'email'     => [
                'required',
                'email',
                'max:200',
                Rule::unique('users', 'email')->ignore($this->teacher ?? null)
            ],
            'password'  => [
                'nullable',
                'string',
                'min:8',
                'max:200',
                'confirmed'
            ],
            'group_id'  => [
                'required',
                'exists:groups,id'
            ],
        ];
    }

    public function render()
    {
        return view('livewire.modals.teacher.edit-teacher-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->updateTeacher();
        $this->hideModal();
        $this->refreshTeachersTable();
    }

    private function updateTeacher(): void
    {
        $this->teacher->full_name = $this->full_name;
        $this->teacher->email = $this->email;
        $this->teacher->group_id = $this->group_id;
        if ($this->password) {
            $this->teacher->password = Hash::make($this->password);
        }
        $this->teacher->save();
    }


}
