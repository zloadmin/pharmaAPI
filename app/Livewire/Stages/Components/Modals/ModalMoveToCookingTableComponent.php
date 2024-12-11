<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalMoveToCookingTableComponent extends ModalBase
{
    use HasSession;

    public ?SessionComponent $sessionComponent = null;

    #[On('show-modal-move-to-cooking-table')]
    public function showModal($id): void
    {
        Log::info('ModalMoveToCookingTableComponent::showModal', [$id]);
        $this->setCartComponent(SessionComponent::with('component')->find($id));
    }

    public function setCartComponent(SessionComponent $component = null): void
    {
        $this->sessionComponent = $component;
    }

    public function mount(string $session): void
    {
        $this->setSession($session);
    }

    public function moveToCookingTable(): void
    {
        if ($this->sessionComponent) {
            $this->sessionComponent->moveToCookingTable();
            $this->dispatch('session-component-moved-to-cooking-table');
            $this->setCartComponent();
        }
    }
    public function close(): void
    {
        $this->setCartComponent();
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-move-to-cooking-table');
    }

}
