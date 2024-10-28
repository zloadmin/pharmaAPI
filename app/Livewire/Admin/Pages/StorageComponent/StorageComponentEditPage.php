<?php

namespace App\Livewire\Admin\Pages\StorageComponent;

use App\Enums\StorageComponent\StorageComponentType;
use App\Livewire\Admin\Pages\StorageComponent\Traits\HasStorageComponentForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\StorageComponent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class StorageComponentEditPage extends Component
{
    use HasBreadcrumb;
    use HasStorageComponentForm;
    use HasRedirects;

    public StorageComponent $storageComponent;

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:250'],
            'description' => ['required', 'string'],
            'type'        => ['required', Rule::in(StorageComponentType::values())],
            'image'       => ['nullable', 'image']
        ];
    }

    public function mount(StorageComponent $storageComponent): void
    {
        $this->setStorageComponent($storageComponent);
        $this->setFormFields($storageComponent);
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-component-edit-page')
            ->layoutData([
                'breadcrumb' => $this->getStorageComponentCreatePageBreadcrumb($this->storageComponent)
            ]);
    }

    public function save(): void
    {
        $this->validate();
        $this->updatedStorageComponent();
        $this->redirectToStorageComponentsPage();

    }

    private function updatedStorageComponent(): void
    {

        $this->storageComponent->name = $this->name;
        $this->storageComponent->description = $this->description;
        $this->storageComponent->type = $this->type;
        if ($this->image) {
            $this->storageComponent->image = $this->image->store(path: 'storage_components');
        }
        $this->storageComponent->update();
    }

    private function redirectToStorageComponentsPage(): void
    {
        $this->redirectRoute('admin.storage-components-page', [], true, true);
    }

    private function setStorageComponent(StorageComponent $storageComponent): void
    {
        $this->storageComponent = $storageComponent;
    }

    private function setFormFields(StorageComponent $storageComponent)
    {
        $this->name = $storageComponent->name;
        $this->description = $storageComponent->description;
        $this->type = $storageComponent->type->value;
    }


}
