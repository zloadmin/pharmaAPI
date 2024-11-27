<?php

namespace App\Livewire\Stages;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component as LivewireComponent;

class IndexStage extends LivewireComponent
{
    use HasSession;

    public function mount(string $session): void
    {
        $this->setSession($session);

    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.index-stage');
    }
}
