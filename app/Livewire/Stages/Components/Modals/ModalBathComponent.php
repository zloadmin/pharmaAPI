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

class ModalBathComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableMoving;
    use HasCookingTableChooseMode;


    public ?SessionComponent $leftBoxSessionComponent = null;
    public ?SessionComponent $rightBoxSessionComponent = null;
    public bool $isShow = false;

    public int $temperature = 0;
    public int $seconds = 0;


    public function mount(string $session): void
    {
        $this->init($session);
    }

    public function init(string $session): void
    {
        $this->setSession($session);
        $this->setLeftBoxSessionComponent();
        $this->setRightBoxSessionComponent();
        $this->disableCookingTableChooseMode();
        $this->dispatch('bath-init');
    }

    #[On('session-component-moved-to-in-bath-left')]
    #[On('session-component-moved-to-in-bath-right')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponents(): void
    {
        $this->init($this->session);
    }


    #[On('show-modal-bath')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-modal-filtration')]
    #[On('hide-modal-bath')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-bath');
    }

    private function setLeftBoxSessionComponent(): void
    {

        $this->leftBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inBathLeftBox()->first();
    }

    private function setRightBoxSessionComponent(): void
    {
        $this->rightBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inBathRightBox()->first();
    }

    public function run(): void
    {

        if ($this->leftBoxSessionComponent) {
            $this->leftBoxSessionComponent->addBathData($this->seconds, $this->temperature);
            $this->leftBoxSessionComponent->moveToCookingTable();
        }
        if ($this->rightBoxSessionComponent) {
            $this->rightBoxSessionComponent->addBathData($this->seconds, $this->temperature);
            $this->rightBoxSessionComponent->moveToCookingTable();
        }

        $this->dispatch('hide-modal-bath');
        $this->dispatch('session-component-moved-to-cooking-table');

    }


}
