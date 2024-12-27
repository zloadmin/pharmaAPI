<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryStepForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\LaboratoryStep;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class LaboratoryStepEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasLaboratoryStepForm;

//    use HasRedirects;
//
    public Laboratory $laboratory;
    public LaboratoryStep $laboratoryStep;


    public function mount(Laboratory $laboratory, LaboratoryStep $laboratoryStep): void
    {
        $this->laboratory = $laboratory;
        $this->laboratoryStep = $laboratoryStep;
        $this->loadFormFields($laboratoryStep);
    }

//    public function save(): void
//    {
//        $this->validate();
//        $this->createLaboratoryStep();
//        $this->redirectToLaboratoryStepsPage($this->laboratory);
//    }
//
//    public function createLaboratoryStep(): LaboratoryStep
//    {
//        return $this->laboratory->steps()->create([
//            'name' => $this->name
//        ]);
//    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-step-edit-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryStepEditPageBreadcrumb($this->laboratory, $this->laboratoryStep),
        ]);
    }


}
