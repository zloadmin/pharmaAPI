<?php

namespace App\Livewire\Stages\StorageStage;


use App\Livewire\Traits\HasSession;
use App\Models\StorageComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;



class StorageStageComponentList extends Component
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
        $this->components = StorageComponent::select('id', 'name', 'type', 'description', 'image')->get();
    }
}
