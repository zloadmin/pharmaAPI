<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\LaboratoryStep;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class LaboratoryStepsPage extends LivewireComponent
{
    use HasBreadcrumb;

//    use HasLaboratoryForm;
//    use HasRedirects;

    public Laboratory $laboratory;


    public function mount(Laboratory $laboratory): void
    {
        $this->laboratory = $laboratory;
    }


    #[Title('Задачи')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-steps-page', [
            'steps' => $this->laboratory->steps()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getLaboratoryStepsPageBreadcrumb($this->laboratory),
        ]);
    }


}
