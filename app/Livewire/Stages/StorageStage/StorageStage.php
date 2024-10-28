<?php

namespace App\Livewire\Stages\StorageStage;

use App\Livewire\Traits\HasSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Component;

class StorageStage extends Component
{
    use HasSession;


    public function mount(string $session): void
    {
        $this->setSession($session);
    }

    public function render()
    {
        return view('livewire.stages.storage-stage.storage-stage');
    }
}
