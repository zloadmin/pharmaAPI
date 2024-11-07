<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\Laboratory;
use Livewire\Attributes\Title;
use Livewire\Component;

class LaboratoriesPage extends Component
{
    use HasBreadcrumb;

    #[Title('Лабораторные работы')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratories-page', [
            'laboratories' => Laboratory::withCount('storageComponents')->latest()->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getLaboratoryPageBreadcrumb()
        ]);
    }
    public function delete($id): void
    {
        $labaratory = Laboratory::find($id);
        $labaratory?->delete();
    }
}
