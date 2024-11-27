<?php

namespace App\Livewire\Admin\Pages\StorageComponent;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\Component;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;
use Livewire\WithPagination;

class StorageComponentsPage extends LivewireComponent
{
    use HasBreadcrumb;
    use WithPagination;

    #[Title('Компоненты')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-components-page', [
            'components' => Component::latest()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getStorageComponentsPageBreadcrumb()
        ]);
    }

    public function delete($id): void
    {
        $storageComponent = Component::find($id);
        $storageComponent?->delete();
    }
}
