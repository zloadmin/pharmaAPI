<?php

namespace App\Livewire\Admin\Pages\Teacher;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class TeachersPage extends Component
{


    use HasBreadcrumb;

    #[Title('Преподаватели')]
    public function render()
    {
        return view('livewire.admin.pages.teacher.teachers-page')->layoutData([
            'breadcrumb' => $this->getTeachersPageItem()
        ]);
    }

}
