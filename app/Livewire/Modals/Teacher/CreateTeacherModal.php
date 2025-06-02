<?php

namespace App\Livewire\Modals\Teacher;


use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateTeacherModal extends Component
{
    use HasTeacherForm;
    use HasEvents;

    public function render()
    {
        return view('livewire.modals.teacher.create-teacher-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->createTeacher();
        $this->hideModal();
        $this->refreshTeachersTable();
    }

    private function createTeacher(): void
    {
        Teacher::create([
            'full_name'       => $this->full_name,
            'email'           => $this->email,
            'password'        => Hash::make($this->password),
            'group_id'        => $this->group_id,
        ]);
    }


}
