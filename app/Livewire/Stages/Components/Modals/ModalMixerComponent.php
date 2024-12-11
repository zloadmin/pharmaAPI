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

class ModalMixerComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableChooseMode;
    use HasCookingTableMoving;

    public ?SessionComponent $sessionComponent = null;
    public bool $isShow = false;


    public function mount(string $session): void
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setSessionComponent();
        $this->disableCookingTableChooseMode();
    }

    #[On('session-component-moved-to-mixer')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponent(): void
    {
        $this->init($this->session);
    }

    private function setSessionComponent(): void
    {
        $this->sessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixer()->first();
    }

    #[On('show-modal-mixer')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-bath')]
    #[On('show-modal-filtration-before')]
    #[On('show-modal-filtration-after')]
    #[On('hide-modal-mixer')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function setMixerChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inMixer);
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-mixer');
    }


}
