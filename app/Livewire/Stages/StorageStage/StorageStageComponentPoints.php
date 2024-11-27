<?php

namespace App\Livewire\Stages\StorageStage;

use App\Livewire\Traits\HasSession;
use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component as LivewireComponent;

class StorageStageComponentPoints extends LivewireComponent
{
    use HasSession;

    public Collection $components;

    public function mount(string $session): void
    {
        $this->setSession($session);
        $this->setComponents();
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.storage-stage.storage-stage-component-points');
    }




    private function setComponents(): void
    {
        $this->components = Component::select(['id', 'padding_top', 'padding_right', 'short_name'])->get();
    }
}
