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

    public $is_example = null;

    #[Title('Компоненты')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-components-page', [
            'components' => $this->getComponents()
        ])->layoutData([
            'breadcrumb' => $this->getStorageComponentsPageBreadcrumb()
        ]);
    }

    private function isSetIsExample(): bool
    {
        return !is_null($this->is_example) && $this->is_example != '';
    }

    public function getComponents()
    {
        $components = Component::query();
        if ($this->isSetIsExample()) {
            $components->where('is_example', $this->is_example);
        }
        $components->orderBy('name');
        return $components->paginate();
    }

    public function delete($id): void
    {
        $storageComponent = Component::find($id);
        $storageComponent?->delete();
    }

    public function duplicate($id)
    {
        $storageComponent = Component::find($id);
        if ($storageComponent) {
            $newComponent = $storageComponent->replicate();
            $newComponent->is_example = false;
            $newComponent->name = sprintf('Создан из "%s"', $storageComponent->name);
            $newComponent->short_name = $newComponent->name;
            $newComponent->push();
            $this->redirectRoute('admin.component-edit-page', $newComponent);
        }
    }
}
