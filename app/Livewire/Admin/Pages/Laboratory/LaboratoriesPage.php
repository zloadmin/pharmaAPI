<?php

namespace App\Livewire\Admin\Pages\Laboratory;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Models\Laboratory;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class LaboratoriesPage extends LivewireComponent
{
    use HasBreadcrumb;

    #[Title('Лабораторные работы')]
    public function render()
    {
        return view('livewire.admin.pages.laboratory.laboratories-page', [
            'laboratories' => Laboratory::withCount('components')->orderBy('name')->paginate()
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
