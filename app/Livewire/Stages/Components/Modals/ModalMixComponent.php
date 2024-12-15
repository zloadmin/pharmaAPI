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

class ModalMixComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableMoving;
    use HasCookingTableChooseMode;


    public ?SessionComponent $leftBoxSessionComponent = null;
    public ?SessionComponent $centerBoxSessionComponent = null;
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
        $this->setCenterBoxSessionComponent();
        $this->setRightBoxSessionComponent();
        $this->disableCookingTableChooseMode();
    }

    #[On('session-component-moved-to-mix-left')]
    #[On('session-component-moved-to-mix-center')]
    #[On('session-component-moved-to-mix-right')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponents(): void
    {
        $this->init($this->session);
    }


    #[On('show-modal-mix')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-modal-filtration')]
    #[On('show-modal-bath')]
    #[On('hide-modal-mix')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function run(): void
    {
        if($this->isHasTwoOrMoreComponents()) {
            $this->createMixSessionComponent();
            $this->deleteCurrentSessionComponents();
        }
        $this->dispatch('hide-modal-mix');
        $this->dispatch('session-component-moved-to-cooking-table');

    }
    private function deleteCurrentSessionComponents(): void
    {
        $this->leftBoxSessionComponent?->delete();
        $this->centerBoxSessionComponent?->delete();
        $this->rightBoxSessionComponent?->delete();
    }
    private function createMixSessionComponent() : void
    {
        SessionComponent::create([
            'session' => $this->session,
            'place' => SessionComponentPlace::onCookingTable,
            'is_mixed' => true,
            'mixed_left_component_id' => $this->leftBoxSessionComponent?->id,
            'mixed_center_component_id' => $this->centerBoxSessionComponent?->id,
            'mixed_right_component_id' => $this->rightBoxSessionComponent?->id,
        ]);
    }
    private function isHasTwoOrMoreComponents(): bool
    {
        return ($this->leftBoxSessionComponent && $this->centerBoxSessionComponent) ||
            ($this->leftBoxSessionComponent && $this->rightBoxSessionComponent) ||
            ($this->centerBoxSessionComponent && $this->rightBoxSessionComponent);
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-mix');
    }

    private function setLeftBoxSessionComponent(): void
    {

        $this->leftBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixLeftBox()->first();
    }

    private function setCenterBoxSessionComponent(): void
    {

        $this->centerBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixCenterBox()->first();
    }

    private function setRightBoxSessionComponent(): void
    {
        $this->rightBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixRightBox()->first();
    }




}
