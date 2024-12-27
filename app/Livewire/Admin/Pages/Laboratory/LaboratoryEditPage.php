<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\Component;
use App\Models\PharmacologicalArticle;
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

    public function mount(Laboratory $laboratory)
    {
        $this->laboratory = $laboratory;
        $this->components = Component::getDropdownArray();
        $this->pharmacologicalArticles = PharmacologicalArticle::getDropdownArray();
        $this->loadFormFields($laboratory);
        $this->initCheckValues($laboratory);
    }

    public function save()
    {

        $this->validate();
        $this->updateLaboratory();
        $this->updateLaboratoryStorageComponents();
        $this->redirectToLaboratoriesPage();
    }

    public function updateLaboratory(): void
    {
        $this->laboratory->update([
            'name'                       => $this->name,
            'description'                => $this->description,
            'pharmacological_article_id' => $this->pharmacological_article_id,
            'check_values'               => $this->check_values,
        ]);
    }

    private function updateLaboratoryStorageComponents(): void
    {
        $this->laboratory->components()->sync($this->component_ids);
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-edit-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryEditPageBreadcrumb($this->laboratory)
        ]);
    }


}
