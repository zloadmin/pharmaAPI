<?php

namespace App\Livewire\Stages\CookingStage;

use App\Enums\Stages\Stage;
use App\Livewire\Traits\HasSession;
use App\Livewire\Traits\HasUnlockStages;
use App\Models\SessionComponent;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class CookingStage extends Component
{
    use HasSession;
    use HasUnlockStages;

    public function mount($session)
    {
        $this->setSession($session);
        $this->unlockStage(Stage::chromatograph);
    }


    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.cooking-stage.cooking-stage');
    }


}
