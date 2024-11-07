<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Pages\Laboratory\Traits\HasLaboratoryForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\StorageComponent;
use Livewire\Attributes\Title;
use Livewire\Component;

class LaboratoryEditPage extends Component
{
    use HasBreadcrumb;
    use HasLaboratoryForm;
    use HasRedirects;

    public Laboratory $laboratory;
    public array $storageComponents;

    public function mount(Laboratory $laboratory)
    {
        $this->laboratory = $laboratory;
        $this->storageComponents = StorageComponent::getDropdownArray();
        $this->loadFormFields($laboratory);
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
            'name'        => $this->name,
            'description' => $this->description,
        ]);
    }

    private function updateLaboratoryStorageComponents(): void
    {
        $this->laboratory->storageComponents()->sync($this->storage_component_ids);
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratory-edit-page')->layoutData([
            'breadcrumb' => $this->getLaboratoryEditPageBreadcrumb($this->laboratory)
        ]);
    }


}
