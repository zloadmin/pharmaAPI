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

class LaboratoryStepCreatePage extends LivewireComponent
{
    use HasBreadcrumb;

    use HasLaboratoryStepForm;
    use HasRedirects;

    public Laboratory $laboratory;


    public function mount(Laboratory $laboratory): void
    {
        $this->laboratory = $laboratory;
    }

    public function save(): void
    {
        $this->validate();
        $this->createLaboratoryStep();
        $this->redirectToLaboratoryStepsPage($this->laboratory);
    }

    public function createLaboratoryStep(): LaboratoryStep
    {
        return $this->laboratory->steps()->create([
            'name' => $this->name
        ]);
    }

    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-step-create-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryStepCreatePageBreadcrumb($this->laboratory),
        ]);
    }


}
