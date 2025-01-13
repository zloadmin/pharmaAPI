<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\LaboratoryWeightingComponent;
use App\Models\PharmacologicalArticle;
use App\Models\Video;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class LaboratoryEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;

    public Laboratory $laboratory;
    public array $components;
    public array $pharmacologicalArticles;
    public array $videoList;

    public function mount(Laboratory $laboratory)
    {
        $this->laboratory = $laboratory;
        $this->components = Component::getDropdownArray();
        $this->pharmacologicalArticles = PharmacologicalArticle::getDropdownArray();
        $this->videoList = Video::getDropdownArray();
        $this->loadFormFields($laboratory);
        $this->initCheckValues($laboratory);
    }

    public function save()
    {
        $this->validate();
        $this->updateLaboratory();
        $this->updateLaboratoryStorageComponents();
        $this->updateLaboratoryWeightingComponents();
        $this->redirectToLaboratoriesPage();
    }

    private function setLaboratoryMainFields(): void
    {
        $this->laboratory->name = $this->name;
        $this->laboratory->description = $this->description;
        $this->laboratory->pharmacological_article_id = $this->pharmacological_article_id;
        $this->laboratory->check_values = $this->check_values;
    }


    public function updateLaboratory(): void
    {
        $this->laboratory->update($this->getLaboratoryMainFields() + $this->getLaboratoryVideoFields());
    }

    private function updateLaboratoryStorageComponents(): void
    {
        $this->laboratory->components()->sync($this->component_ids);
    }

    private function updateLaboratoryWeightingComponents(): void
    {
        $this->laboratory->weightingComponents()->delete();
        $this->laboratory->weightingComponents()->saveMany($this->getWeightingComponentModels());
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-edit-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryEditPageBreadcrumb($this->laboratory)
        ]);
    }


}
