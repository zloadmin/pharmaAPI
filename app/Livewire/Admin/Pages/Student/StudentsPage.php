<?php

namespace App\Livewire\Admin\Pages\Student;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class StudentsPage extends Component
{


    use HasBreadcrumb;

    #[Title('Студенты')]
    public function render()
    {

        return view('livewire.admin.pages.student.students-page')->layoutData([
            'breadcrumb' => $this->getStudentsPageItem()
        ]);
    }

}
