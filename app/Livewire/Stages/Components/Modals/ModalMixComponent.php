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


    public ?SessionComponent $mixBoxOneSessionComponent = null;
    public ?SessionComponent $mixBoxTwoSessionComponent = null;
    public ?SessionComponent $mixBoxThreeSessionComponent = null;
    public ?SessionComponent $mixBoxFourSessionComponent = null;

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
        $this->setMixBoxOneSessionComponent();
        $this->setMixBoxTwoSessionComponent();
        $this->setMixBoxThreeSessionComponent();
        $this->setMixBoxFourSessionComponent();
        $this->disableCookingTableChooseMode();
    }

    #[On('session-component-moved-to-mix-one')]
    #[On('session-component-moved-to-mix-two')]
    #[On('session-component-moved-to-mix-three')]
    #[On('session-component-moved-to-mix-four')]
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

        if ($this->isHasAllComponents()) {
            $this->createMixedComponent();
            $this->clearComponents();
        }
        $this->dispatch('hide-modal-mix');
        $this->dispatch('session-component-moved-to-cooking-table');

    }


    private function isHasAllComponents(): bool
    {
        return $this->mixBoxOneSessionComponent &&
            $this->mixBoxTwoSessionComponent &&
            $this->mixBoxThreeSessionComponent &&
            $this->mixBoxFourSessionComponent;
    }


    public function setMixBoxOneSessionComponent(): void
    {
        $this->mixBoxOneSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixBoxOne()->first();
    }

    public function setMixBoxTwoSessionComponent(): void
    {
        $this->mixBoxTwoSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixBoxTwo()->first();;
    }

    public function setMixBoxThreeSessionComponent(): void
    {
        $this->mixBoxThreeSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixBoxThree()->first();;
    }

    public function setMixBoxFourSessionComponent(): void
    {
        $this->mixBoxFourSessionComponent = SessionComponent::with('component')->bySession($this->session)->inMixBoxFour()->first();;
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-mix');
    }

    private function createMixedComponent(): void
    {
        SessionComponent::create([
            'place'                      => SessionComponentPlace::onCookingTable,
            'session'                    => $this->session,
            'component_id'               => $this->mixBoxThreeSessionComponent->component_id,
            'is_mixed'                   => true,
            'mixed_one_component_id'     => $this->mixBoxOneSessionComponent->id,
            'mixed_two_component_id'     => $this->mixBoxTwoSessionComponent->id,
            'mixed_three_component_id'   => $this->mixBoxThreeSessionComponent->id,
            'mixed_four_component_id'    => $this->mixBoxFourSessionComponent->id,
            'mixed_weighed_component_id' => $this->mixBoxFourSessionComponent->weighed_right_component_id ?? $this->mixBoxFourSessionComponent->mixed_weighed_component_id,
        ]);
    }

    private function clearComponents(): void
    {
        $this->mixBoxOneSessionComponent->moveToCookingTable();
        $this->mixBoxTwoSessionComponent->moveToCookingTable();
        $this->mixBoxThreeSessionComponent->delete();
        $this->mixBoxFourSessionComponent->delete();
    }


}
