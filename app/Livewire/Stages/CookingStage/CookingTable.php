<?php

namespace App\Livewire\Stages\CookingStage;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class CookingTable extends Component
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
        return view('livewire.stages.cooking-stage.cooking-table');
    }

    #[On('session-component-moved-to-cooking-table')]
    #[On('session-component-moved-to-cart')]
    #[On('session-component-moved-to-sink')]
    #[On('session-component-moved-to-ph-meter')]
    #[On('session-component-moved-to-mixer')]
    #[On('session-component-moved-to-in-bath-left')]
    #[On('session-component-moved-to-in-bath-right')]
    #[On('session-component-moved-to-in-filtration')]
    #[On('session-component-moved-to-mix-one')]
    #[On('session-component-moved-to-mix-two')]
    #[On('session-component-moved-to-mix-three')]
    #[On('session-component-moved-to-mix-four')]
    #[On('session-component-moved-to-cooking-table')]
    public function updateList(): void
    {
        $this->setSessionComponents($this->session);
        $this->chooseModePlace = null;
    }

    #[On('set-cooking-table-choose-mode')]
    public function setChooseMode(?SessionComponentPlace $place): void
    {
        Log::info('WeightingTable::setChooseMode', [$place]);
        $this->chooseModePlace = $place;
        $this->setSessionComponents();
    }

    #[On('unset-cooking-table-choose-mode')]
    public function unsetTableChooseMode(): void
    {
        $this->chooseModePlace = null;
        $this->setSessionComponents();
    }

    public function setSessionComponents(): void
    {
        $this->sessionComponents = SessionComponent::with('component')->bySession($this->session)->onCookingTable()->latest()->get();
    }

    private function getSessionComponent(int $sessionComponentId): ?SessionComponent
    {
        return SessionComponent::where('place', SessionComponentPlace::onCookingTable)->find($sessionComponentId);
    }

    public function showModalCookingTableComponent(int $sessionComponentId): void
    {
        $sessionComponent = $this->getSessionComponent($sessionComponentId);
        if ($sessionComponent) {
            $this->dispatch('show-modal-cooking-table-component', $sessionComponentId);
        }
    }

    public function moveAllCartItemsToCookingTable(): void
    {
        SessionComponent::bySession($this->session)
            ->byPlace(SessionComponentPlace::inCart)
            ->update(['place' => SessionComponentPlace::onCookingTable]);

        $this->dispatch('session-component-moved-to-cooking-table');
    }

    public function moveAllCookingTableItemsToCart(): void
    {
        SessionComponent::bySession($this->session)
            ->byPlace(SessionComponentPlace::onCookingTable)
            ->update(['place' => SessionComponentPlace::inCart]);

        $this->dispatch('session-component-moved-to-cart');
    }

    public function moveToPlace(int $sessionComponentId, SessionComponentPlace $place): void
    {
        $sessionComponent = $this->getSessionComponent($sessionComponentId);
        if ($sessionComponent) {
            $sessionComponent->changePlace($place);
            $this->chooseModePlace = null;
            $this->dispatch('session-component-moved-to-' . $place->generalName());
        }
    }
}
