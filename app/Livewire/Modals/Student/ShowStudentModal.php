<?php

namespace App\Livewire\Modals\Student;

use App\Livewire\Modals\Teacher\HasTeacherForm;
use App\Livewire\Traits\HasEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShowStudentModal extends Component
{


    public Student $student;

    public function mount(int $studentId): void
    {
        $this->student = Student::findOrFail($studentId);
    }



    public function render()
    {
        return view('livewire.modals.student.show-student-modal');
    }




}
