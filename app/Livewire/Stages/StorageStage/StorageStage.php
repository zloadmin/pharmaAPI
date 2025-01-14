<?php

namespace App\Livewire\Stages\StorageStage;

use App\Enums\Stages\Stage;
use App\Livewire\Traits\HasSession;
use App\Livewire\Traits\HasUnlockStages;
use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component as LivewireComponent;

class StorageStage extends LivewireComponent
{
    use HasSession;
    use HasUnlockStages;


    public Collection $components;

    public function mount(string $session): void
    {
        $this->setSession($session);
        $this->unlockStage(Stage::weighting);
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.storage-stage.storage-stage');
    }

}
