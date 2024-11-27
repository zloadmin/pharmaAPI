<?php

namespace App\Livewire\Stages\WeightingStage;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Livewire\Attributes\On;
use Livewire\Component;

class Scales extends Component
{
    use HasSession;

    public ?SessionComponent $leftBoxComponent;
    public ?SessionComponent $rightBoxComponent;
    public ?SessionComponent $bottomBoxComponent;

    public function mount(string $session)
    {
        $this->init($session);
    }

    public function init(string $session)
    {
        $this->setSession($session);
        $this->setLeftBoxComponent();
        $this->setRightBoxComponent();
        $this->setBottomBoxComponent();
    }


    public function render()
    {
        return view('livewire.stages.weighting-stage.scales');
    }

    #[On('session-component-moved-to-scales')]
    public function updateScales(): void
    {
        $this->init($this->session);
    }

    private function setLeftBoxComponent(): void
    {
        $this->leftBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesLeftBox);
    }

    private function setRightBoxComponent(): void
    {
        $this->rightBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesRightBox);
    }

    private function setBottomBoxComponent(): void
    {
        $this->bottomBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesBottomBox);
    }

    public function getSessionComponentByPlace(SessionComponentPlace $place): ?SessionComponent
    {
        return SessionComponent::bySession($this->session)
            ->byPlace($place)
            ->first();
    }

    public function setLeftBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesLeftBox);
    }

    public function setRightBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesRightBox);
    }

    public function setBottomBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesBottomBox);
    }

    private function setTableChooseMode(SessionComponentPlace $place): void
    {
        $this->dispatch('set-table-choose-mode', $place);
    }
}
