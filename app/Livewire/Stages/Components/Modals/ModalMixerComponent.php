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
    public bool $isRun = false;
    public int $seconds = 0;


    public function mount(string $session, bool $isShow = false): void
    {
        $this->init($session);
        $this->isShow = $isShow;
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setSessionComponent();
        $this->setIsRun();
        $this->disableCookingTableChooseMode();
        $this->dispatch('mixer-init');
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
    #[On('show-modal-filtration-mobile-phase')]
    #[On('show-modal-mix')]
    #[On('hide-modal-mixer')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }



    public function render()
    {
        return view('livewire.stages.components.modals.modal-mixer');
    }

    private function setIsRun(): void
    {
        $this->isRun = false;
    }

    public function run()
    {
        if ($this->sessionComponent) {
            $this->dispatch('show-modal-video', fileName: 'mixer.mp4');
            $this->sessionComponent->addMixerSeconds($this->seconds);
            $this->sessionComponent->moveToCookingTable();
            $this->dispatch('hide-modal-mixer');
            $this->dispatch('session-component-moved-to-cooking-table');
        }
    }
}
