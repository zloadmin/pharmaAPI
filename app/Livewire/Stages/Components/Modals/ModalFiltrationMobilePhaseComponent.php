<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Stages\CookingStage\Traits\HasCookingTableChooseMode;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableMoving;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalFiltrationMobilePhaseComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableChooseMode;
    use HasCookingTableMoving;


    public ?SessionComponent $sessionComponent = null;
    public bool $isShow = false;


    public function mount(string $session, bool $isShow = false): void
    {
        $this->init($session);
        $this->isShow = $isShow;
    }
    public function init(string $session): void
    {
        $this->setSession($session);
        $this->setSessionComponent();

        $this->disableCookingTableChooseMode();
    }

    private function setSessionComponent(): void
    {
        $this->sessionComponent = SessionComponent::with('component')->bySession($this->session)->inFiltration()->first();
    }

    #[On('session-component-moved-to-in-filtration')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponent(): void
    {
        $this->init($this->session);
    }

    #[On('show-modal-filtration-mobile-phase')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-component')]
    #[On('show-modal-bath')]
    #[On('hide-modal-filtration-mobile-phase')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }
    public function run()
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        if ($this->sessionComponent) {
            $this->sessionComponent->markAsFiltered();
            $this->sessionComponent->moveToCookingTable();
        }
        $this->dispatch('hide-modal-filtration-mobile-phase');
        $this->dispatch('session-component-moved-to-cooking-table');
    }


    public function render()
    {
        return view('livewire.stages.components.modals.modal-filtration-mobile-phase');
    }

}
