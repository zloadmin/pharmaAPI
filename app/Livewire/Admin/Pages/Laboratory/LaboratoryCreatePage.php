<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\StorageComponent;
use Livewire\Attributes\Title;
use Livewire\Component;

class LaboratoryCreatePage extends Component
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;

    public array $storageComponents;

    public function mount()
    {
        $this->storageComponents = StorageComponent::getDropdownArray();
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
            'name'        => $this->name,
            'description' => $this->description,
        ]);
    }

    private function createLaboratoryStorageComponents(Laboratory $laboratory): void
    {
        $laboratory->storageComponents()->sync($this->storage_component_ids);
    }

    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-create-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryCreatePageBreadcrumb()
        ]);
    }


}
