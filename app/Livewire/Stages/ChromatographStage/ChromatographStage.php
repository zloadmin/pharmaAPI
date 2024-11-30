<?php

namespace App\Livewire\Stages\ChromatographStage;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographStage extends Component
{
    use HasSession;
    public function mount($session)
    {
        $this->setSession($session);
    }
    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.chromatograph-stage');
    }
}
