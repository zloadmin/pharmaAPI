<?php

namespace App\Livewire\Stages\WeightingStage;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class WeightingTable extends Component
{
    use HasSession;

    public Collection $sessionComponents;
    public ?SessionComponentPlace $chooseModePlace = null;

    public function mount(string $session)
    {
        $this->setSession($session);
        $this->setSessionComponents($session);
    }


    public function render()
    {
        return view('livewire.stages.weighting-stage.weighting-table');
    }

    #[On('session-component-moved-to-table')]
    #[On('session-component-moved-to-sink')]
    #[On('session-component-moved-to-cart')]
    #[On('session-component-moved-to-scales')]
    #[On('session-component-moved-to-table')]
    public function updateList(): void
    {
        $this->setSessionComponents($this->session);
    }

    #[On('set-table-choose-mode')]
    public function setChooseMode(?SessionComponentPlace $place): void
    {
        Log::info('WeightingTable::setChooseMode', [$place]);
        $this->chooseModePlace = $place;
        $this->setSessionComponents();
    }

    #[On('unset-table-choose-mode')]
    public function unsetTableChooseMode(): void
    {
        $this->chooseModePlace = null;
        $this->setSessionComponents();
    }

    public function setSessionComponents(): void
    {
        $this->sessionComponents = SessionComponent::with('component')->bySession($this->session)->onTable()->latest()->get();
    }

    private function getSessionComponent(int $sessionComponentId): ?SessionComponent
    {
        return SessionComponent::where('place', SessionComponentPlace::onTable)->find($sessionComponentId);
    }

    public function showModalTableComponent(int $sessionComponentId): void
    {
        $sessionComponent = $this->getSessionComponent($sessionComponentId);
        if ($sessionComponent) {
            $this->dispatch('show-modal-table-component', $sessionComponentId);
        }
    }

    public function moveAllCartItemsToTable(): void
    {
        SessionComponent::bySession($this->session)
            ->byPlace(SessionComponentPlace::inCart)
            ->update(['place' => SessionComponentPlace::onTable]);

        $this->dispatch('session-component-moved-to-table');
    }

    public function moveToScales(int $sessionComponentId, SessionComponentPlace $place): void
    {
        $sessionComponent = $this->getSessionComponent($sessionComponentId);
        if ($sessionComponent) {
            $sessionComponent->moveToScales($place);
            $this->chooseModePlace = null;
            $this->dispatch('session-component-moved-to-scales');
        }
    }
}
