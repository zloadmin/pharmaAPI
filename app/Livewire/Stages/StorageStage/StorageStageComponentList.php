<?php

namespace App\Livewire\Stages\StorageStage;


use App\Livewire\Traits\HasSession;
use App\Models\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component as LivewireComponent;



class StorageStageComponentList extends LivewireComponent
{
    use HasSession;

    public Collection $components;

    public function mount(string $session): void
    {
        $this->setSession($session);
        $this->setComponents();
    }

    public function render(): View
    {
        return view('livewire.stages.storage-stage.storage-stage-component-list');
    }



    private function setComponents(): void
    {
        $this->components = Component::select('id', 'name', 'type', 'description', 'image')->get();
    }
}
