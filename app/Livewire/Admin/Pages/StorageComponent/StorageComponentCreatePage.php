<?php

namespace App\Livewire\Admin\Pages\StorageComponent;

use App\Livewire\Admin\Pages\StorageComponent\Traits\HasStorageComponentForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\StorageComponent;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class StorageComponentCreatePage extends Component
{
    use HasBreadcrumb;
    use HasStorageComponentForm;
    use HasRedirects;

    #[Title('Создать')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-component-create-page')
            ->layoutData([
                'breadcrumb' => $this->getStorageComponentCreatePageBreadcrumb()
            ]);
    }

    public function save(): void
    {
        $this->validate();
        $this->createStorageComponent();
        $this->redirectToStorageComponentsPage();
    }

    private function createStorageComponent(): void
    {
        StorageComponent::create([
            'name'        => $this->name,
            'description' => $this->description,
            'type'        => $this->type,
            'image'       => $this->image->store(path: 'storage_components')
        ]);
    }

}
