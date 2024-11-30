<?php

namespace App\Livewire\Stages\CookingStage;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CookingStage extends Component
{
    use HasSession;
    public function mount($session)
    {
        $this->setSession($session);
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.cooking-stage.cooking-stage');
    }
}
