<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Traits;


trait HasRedirects
{
    abstract public function redirectRoute($name, $parameters = [], $absolute = true, $navigate = false);

    public function redirectToStorageComponentsPage(): void
    {
        $this->redirectRoute('admin.storage-components-page', [], true, true);
    }
}