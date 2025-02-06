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

class ModalFiltrationExamplesComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableChooseMode;
    use HasCookingTableMoving;

    public bool $isShow = false;
    public ?SessionComponent $filtrationExampleBoxOne = null;
    public ?SessionComponent $filtrationExampleBoxTwo = null;
    public ?SessionComponent $filtrationExampleBoxThree = null;
    public ?SessionComponent $filtrationExampleBoxFour = null;


    public function mount(string $session, bool $isShow = false): void
    {
        $this->init($session);
        $this->isShow = $isShow;
    }

    public function init(string $session): void
    {
        $this->setSession($session);
        $this->setFiltrationExampleBoxOne();
        $this->setFiltrationExampleBoxTwo();
        $this->setFiltrationExampleBoxThree();
        $this->setFiltrationExampleBoxFour();
        $this->disableCookingTableChooseMode();
    }


    #[On('session-component-moved-to-filtration-example-one')]
    #[On('session-component-moved-to-filtration-example-two')]
    #[On('session-component-moved-to-filtration-example-three')]
    #[On('session-component-moved-to-filtration-example-four')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateComponent(): void
    {
        $this->init($this->session);
    }

    #[On('show-modal-filtration-examples')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-component')]
    #[On('show-modal-bath')]
    #[On('show-modal-filtration-mobile-phase')]
    #[On('hide-modal-filtration-examples')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function run()
    {

        if ($this->isHasAllComponents()) {
            $this->createFilteredExampleComponent();
            $this->clearComponents();
        }

        $this->dispatch('hide-modal-filtration-examples');
        $this->dispatch('session-component-moved-to-cooking-table');
    }

    private function isHasAllComponents(): bool
    {
        return $this->filtrationExampleBoxOne &&
            $this->filtrationExampleBoxTwo &&
            $this->filtrationExampleBoxThree &&
            $this->filtrationExampleBoxFour;
    }

    private function createFilteredExampleComponent(): void
    {
        SessionComponent::filterExample(
            $this->sessionModel,
            $this->filtrationExampleBoxOne,
            $this->filtrationExampleBoxTwo,
            $this->filtrationExampleBoxThree,
            $this->filtrationExampleBoxFour,
        );
    }

    private function clearComponents(): void
    {
        SessionComponent::clearFilterExampleComponents(
            $this->filtrationExampleBoxOne,
            $this->filtrationExampleBoxTwo,
            $this->filtrationExampleBoxThree,
            $this->filtrationExampleBoxFour,
        );
    }


    public function render()
    {
        return view('livewire.stages.components.modals.modal-filtration-examples');
    }

    public function setFiltrationExampleBoxOne(): void
    {
        $this->filtrationExampleBoxOne = SessionComponent::with('component')->bySession($this->session)->inFiltrationExampleBoxOne()->first();
    }

    public function setFiltrationExampleBoxTwo(): void
    {
        $this->filtrationExampleBoxTwo = SessionComponent::with('component')->bySession($this->session)->inFiltrationExampleBoxTwo()->first();
    }

    public function setFiltrationExampleBoxThree(): void
    {
        $this->filtrationExampleBoxThree = SessionComponent::with('component')->bySession($this->session)->inFiltrationExampleBoxThree()->first();;
    }

    public function setFiltrationExampleBoxFour(): void
    {
        $this->filtrationExampleBoxFour = SessionComponent::with('component')->bySession($this->session)->inFiltrationExampleBoxFour()->first();;
    }


}
