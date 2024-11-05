<?php

namespace App\Livewire\Stages;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexStage extends Component
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
