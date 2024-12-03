<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalCartComponent extends ModalBase
{
    use HasSession;

    public ?SessionComponent $sessionComponent = null;

    #[On('show-cart-component-modal')]
    public function showModal($id): void
    {
        Log::info('ModalCartComponent::showModal', [$id]);
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

    public function close()
    {
        $this->setCartComponent();
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-cart-component');
    }

}
