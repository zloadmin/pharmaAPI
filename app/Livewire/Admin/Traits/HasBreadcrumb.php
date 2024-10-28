<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Traits;


use App\Models\StorageComponent;

trait HasBreadcrumb
{
    private function getHomeItem(): array
    {
        return [route('admin.dashboard-page') => 'Панель'];
    }

    private function getStorageComponentsItem(): array
    {
        return [route('admin.storage-components-page') => 'Компоненты склада'];
    }

    private function getStorageComponentCreateItem(): array
    {
        return [route('admin.storage-component-create-page') => 'Создать'];
    }
    private function getStorageComponentEditItem(StorageComponent $storageComponent): array
    {
        return [route('admin.storage-component-edit-page', $storageComponent) => 'Редактировать'];
    }

    private function getStorageComponentsPageBreadcrumb(): array
    {
        return $this->getStorageComponentsItem();
    }

    private function getStorageComponentCreatePageBreadcrumb(): array
    {
        return $this->getStorageComponentsItem() + $this->getStorageComponentCreateItem();
    }
    private function getStorageComponentEditPageBreadcrumb(StorageComponent $storageComponent): array
    {
        return $this->getStorageComponentsItem() + $this->getStorageComponentEditItem($storageComponent);
    }
}