<?php

namespace App\Livewire\Admin\Pages\StorageComponent;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\StorageComponent;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class StorageComponentsPage extends Component
{
    use HasBreadcrumb;
    use WithPagination;

    #[Title('Компоненты склада')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-components-page', [
            'components' => StorageComponent::latest()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getStorageComponentsPageBreadcrumb()
        ]);
    }

    public function delete($id): void
    {
        $storageComponent = StorageComponent::find($id);
        $storageComponent?->delete();
    }
}
