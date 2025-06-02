<?php

namespace App\Livewire\Modals\Student;

use App\Enums\User\UserRandomMode;
use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateStudentModal extends Component
{
    use HasStudentForm;
    use HasEvents;

    public function render()
    {
        return view('livewire.modals.student.create-student-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->createStudent();
        $this->hideModal();
        $this->refreshStudentsTable();
    }

    private function createStudent(): void
    {

        Student::create([
            'full_name'     => $this->full_name,
            'email'         => $this->email,
            'password'      => Hash::make($this->password),
            'group_id'      => $this->group_id,
            'date_of_birth' => $this->date_of_birth ? Carbon::parse($this->date_of_birth)->format('Y-m-d') : null,
        ]);
    }


}
