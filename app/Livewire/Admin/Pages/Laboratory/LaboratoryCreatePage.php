<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\PharmacologicalArticle;
use App\Models\Video;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class LaboratoryCreatePage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;


    public array $pharmacologicalArticles;
    public array $videoList;

    public function mount()
    {

    }

    public function save()
    {
        $this->validate();
        $laboratory = $this->createLaboratory();
        $this->createLaboratoryStorageComponents($laboratory);
        $this->createLaboratoryWeightingComponents($laboratory);
        $this->createLaboratoryCookingComponents($laboratory);
        $this->createLaboratoryCheckValues($laboratory);
//        $this->createLaboratoryMobilePhases($laboratory);
        $this->createLaboratoryVirtualComponents($laboratory);
        $this->redirectToLaboratoriesPage();
    }


    public function createLaboratory(): Laboratory
    {
        return Laboratory::create($this->getLaboratoryMainFields());
    }

    private function createLaboratoryStorageComponents(Laboratory $laboratory): void
    {
        $laboratory->components()->sync($this->component_ids);
    }
    private function createLaboratoryMobilePhases(Laboratory $laboratory): void
    {
        $laboratory->mobilePhases()->saveMany($this->getMobilePhasesModels());
    }
    private function createLaboratoryVirtualComponents(Laboratory $laboratory): void
    {
        $laboratory->virtualComponents()->saveMany($this->getVirtualComponentsModels());
    }

    private function createLaboratoryWeightingComponents(Laboratory $laboratory): void
    {
        $laboratory->weightingComponents()->saveMany($this->getWeightingComponentModels());
    }

    private function createLaboratoryCookingComponents(Laboratory $laboratory): void
    {
        $laboratory->weightingComponents()->saveMany($this->getCookingComponentModels());
    }

    private function createLaboratoryCheckValues(Laboratory $laboratory): void
    {
        $laboratory->checkValues()->saveMany($this->getCheckValuesModels());
    }

    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-create-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryCreatePageBreadcrumb()
        ]);
    }


}
