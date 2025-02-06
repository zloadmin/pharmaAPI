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
use Livewire\Attributes\Url;

class CookingStage extends Component
{
    use HasSession;
    use HasUnlockStages;

    #[Url]
    public $preOpenModal = '';
    public $isPreOpenModals = [
        'ph-meter'                => false,
        'mixer'                   => false,
        'bath'                    => false,
        'filtration-mobile-phase' => false,
        'filtration-examples'     => false,
        'mix'                     => false,
    ];

    public function mount($session)
    {

        $this->setSession($session);
        $this->unlockStage(Stage::chromatograph);
        $this->initIsPreOpenModals();
    }

    private function initIsPreOpenModals(): void
    {
        foreach ($this->isPreOpenModals as $modal => $isOpen) {
            $this->isPreOpenModals[$modal] = $this->preOpenModal == $modal;
        }
    }


    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.cooking-stage.cooking-stage');
    }


}
