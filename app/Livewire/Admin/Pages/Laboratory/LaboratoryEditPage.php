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
use Livewire\Attributes\Url;
use Livewire\Component as LivewireComponent;

class LaboratoryEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;

    public Laboratory $laboratory;
    public array $pharmacologicalArticles;
    public array $videoList;

    #[Url]
    public $tabPreload = '';

    public function mount(Laboratory $laboratory)
    {
        $this->laboratory = $laboratory;
        $this->loadFormFields($laboratory);
        if ($this->tabPreload && isset($this->tabs[$this->tabPreload])) {
            $this->currentTab = $this->tabPreload;
        }
    }

    public function save()
    {
        $this->validate();
        $this->updateLaboratory();
        $this->updateLaboratoryStorageComponents();
        $this->updateLaboratoryWeightingComponents();
        $this->updateLaboratoryCookingComponents();
        $this->updateLaboratoryMobilePhases();
        $this->updateVirtualComponents();
        $this->updateLaboratoryCheckValues();
        $this->updateLaboratoryTasks();
        $this->flashStatus();
        $this->redirectToLaboratoryEditPage();
    }
    public function flashStatus() : void
    {
        session()->flash('status', 'Данные успешно сохранены');
    }


    public function updateLaboratory(): void
    {
        $this->laboratory->update($this->getLaboratoryMainFields($this->laboratory));
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

    private function updateLaboratoryCookingComponents(): void
    {
        $this->laboratory->cookingComponents()->delete();
        $this->laboratory->cookingComponents()->saveMany($this->getCookingComponentModels());
    }

    private function updateLaboratoryMobilePhases(): void
    {
        $this->laboratory->mobilePhases()->delete();
        $this->laboratory->mobilePhases()->saveMany($this->getMobilePhasesModels());
    }

    private function updateVirtualComponents(): void
    {
        $this->laboratory->virtualComponents()->delete();
        $this->laboratory->virtualComponents()->saveMany($this->getVirtualComponentsModels());
    }

    private function updateLaboratoryCheckValues(): void
    {
        $this->laboratory->checkValues()->delete();
        $this->laboratory->checkValues()->saveMany($this->getCheckValuesModels());
    }
    private function updateLaboratoryTasks(): void
    {
        $this->laboratory->tasks()->delete();
        $this->laboratory->tasks()->saveMany($this->getTasksModels());
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-edit-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryEditPageBreadcrumb($this->laboratory)
        ]);
    }


}
