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

class StudentsPage extends Component
{
    use WithFileUploads;
    use HasEvents;

    #[Validate('file')]
    #[Validate('extensions:xlsx', message: 'Файл должен быть формата xlsx')]
    public $file;
    public array $rowResult = [];

    use HasBreadcrumb;


    public function updatedFile()
    {
        $import = new StudentImport();
        $import->import($this->file);
        $this->rowResult = $import->rowResult;
        $this->refreshStudentsTable();
    }

    #[Title('Студенты')]
    public function render()
    {

        return view('livewire.admin.pages.student.students-page')->layoutData([
            'breadcrumb' => $this->getStudentsPageItem()
        ]);
    }

}
