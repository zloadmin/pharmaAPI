<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableChooseMode;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableMoving;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalPHMeterComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableChooseMode;
    use HasCookingTableMoving;

    public ?SessionComponent $sessionComponent = null;
    public bool $isShow = false;
    public bool $isSetElectrodes = false;

    public function mount(string $session): void
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setSessionComponent();
        $this->setIsSetElectrodes();
        $this->disableCookingTableChooseMode();
    }

    #[On('session-component-moved-to-ph-meter')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponent(): void
    {
        $this->init($this->session);
    }

    #[On('show-modal-ph-meter')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-bath')]
    #[On('show-modal-mixer')]
    #[On('show-modal-filtration')]
    #[On('hide-modal-ph-meter')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }


    public function render()
    {
        return view('livewire.stages.components.modals.modal-ph-meter');
    }

    private function setSessionComponent(): void
    {
        $this->sessionComponent = SessionComponent::with('component')->bySession($this->session)->onPHMeter()->first();
    }

    public function setElectrodes(): void
    {
        $this->isSetElectrodes = true;
    }

    private function setIsSetElectrodes(): void
    {
        $this->isSetElectrodes = false;
    }

    public function unsetElectrodes(): void
    {
        $this->isSetElectrodes = false;
    }

}
