<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Traits;


use App\Models\Laboratory;

trait HasRedirects
{
    abstract public function redirectRoute($name, $parameters = [], $absolute = true, $navigate = false);

    public function redirectToStorageComponentsPage(): void
    {
        $this->redirectRoute('admin.components-page', [], true, true);
    }

    public function redirectToLaboratoriesPage(): void
    {
        $this->redirectRoute('admin.laboratories-page', [], true, true);
    }
    public function redirectToLaboratoryEditPage(): void
    {
        $this->redirectRoute('admin.laboratory-edit-page', [
            'laboratory' => $this->laboratory,
            'tabPreload' => $this->currentTab,
        ], true, true);
    }
    public function redirectToDashboardPagePage(): void
    {
        $this->redirectRoute('admin.dashboard-page', [], true, true);
    }
    public function redirectToIndexPage(): void
    {
        $this->redirectRoute('index-page', [], true, true);
    }

    public function redirectToPharmacologicalArticlesPage(): void
    {
        $this->redirectRoute('admin.pharmacological-articles-page', [], true, true);
    }

    public function redirectToVideosPage(): void
    {
        $this->redirectRoute('admin.videos-page', [], true, true);
    }

    public function redirectToLaboratoryStepsPage(Laboratory $laboratory): void
    {
        $this->redirectRoute('admin.laboratory-steps-page', [$laboratory], true, true);
    }



}
