<?php

namespace App\Livewire\Admin\Pages\Student;

use App\Imports\Student\StudentImport;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Traits\HasEvents;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class TeacherStudentsPage extends Component
{

    use HasEvents;
    use HasBreadcrumb;

    #[Title('Студенты')]
    public function render()
    {

        return view('livewire.admin.pages.student.teacher-students-page')->layoutData([
            'breadcrumb' => $this->getTeacherStudentsPageItem()
        ]);
    }

}
