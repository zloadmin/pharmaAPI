<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalMoveToTableComponent extends ModalBase
{
    use HasSession;

    public ?SessionComponent $sessionComponent = null;

    #[On('show-modal-move-to-table-component')]
    public function showModal($id): void
    {
        Log::info('ModalMoveToTableComponent::showModal', [$id]);
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

    public function moveToTable()
    {
        if ($this->sessionComponent) {
            $this->sessionComponent->moveToTable();
            $this->dispatch('session-component-moved-to-table');
            $this->setCartComponent();
        }
    }
    public function close()
    {
        $this->setCartComponent();
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-move-to-table');
    }

}
