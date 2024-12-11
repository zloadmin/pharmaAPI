<?php

namespace App\Livewire\Stages\CookingStage;

use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class CookingStageModals extends Component
{
    use HasSession;

    public bool $isShowModalPHMeter = false;

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session, bool $isShowModalPHMeter = false): void
    {
        Log::info('CookingStageModals::init', compact('session', 'isShowModalPHMeter'));
        $this->setSession($session);
        $this->setIsShowModalPhMeter($isShowModalPHMeter);
    }

    #[On('show-modal-ph-meter')]
    public function showModalPHMeter(): void
    {
        Log::info('CookingStageModals::showModalPHMeter');
        $this->init($this->session, true);
    }

    #[On('hide-modal-ph-meter')]
    public function hideModalPHMeter(): void
    {
        Log::info('CookingStageModals::hideModalPHMeter');
        $this->hideAllModals();
    }

    private function hideAllModals(): void
    {
        Log::info('CookingStageModals::hideAllModals');
        $this->init($this->session);
    }


    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.cooking-stage.cooking-stage-modals');
    }

    private function setIsShowModalPHMeter(bool $isShowModalPHMeter): void
    {
        $this->isShowModalPHMeter = $isShowModalPHMeter;
    }
}
