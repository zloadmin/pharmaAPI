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

class LaboratoryCreatePage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;

    public array $components;
    public array $pharmacologicalArticles;

    public function mount()
    {
        $this->components = Component::getDropdownArray();
        $this->pharmacologicalArticles = PharmacologicalArticle::getDropdownArray();
    }

    public function save()
    {
        $this->validate();
        $laboratory = $this->createLaboratory();
        $this->createLaboratoryStorageComponents($laboratory);
        $this->redirectToLaboratoriesPage();
    }

    public function createLaboratory(): Laboratory
    {
        return Laboratory::create([
            'name'                       => $this->name,
            'description'                => $this->description,
            'pharmacological_article_id' => $this->pharmacological_article_id,
        ]);
    }

    private function createLaboratoryStorageComponents(Laboratory $laboratory): void
    {
        $laboratory->components()->sync($this->component_ids);
    }

    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-create-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryCreatePageBreadcrumb()
        ]);
    }


}
