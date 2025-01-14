<?php

namespace App\Livewire\Stages\Menu;

use App\Enums\Stages\Stage;
use App\Livewire\Traits\HasSession;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class ChangeStageMenu extends Component
{
    use HasSession;


    public function mount($session): void
    {
        $this->setSession($session);
    }

    #[On('stage-unlocked')]
    public function unlockedStage(Stage $stage): void
    {
        Log::info('ChangeStageMenu::unlockedStage', [$stage]);
        $this->setSession($this->session);
    }

    public function render()
    {
        return view('livewire.stages.menu.change-stage-menu');
    }
}
