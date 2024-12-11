<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalWeightingTableComponent extends ModalBase
{
    use HasSession;

    public ?SessionComponent $sessionComponent = null;
    public $value = null;


    public function mount(string $session): void
    {
        $this->setSession($session);
    }

    #[On('show-modal-weighting-table-component')]
    public function showModal($sessionComponentId): void
    {
        Log::info('ModalTableComponent::showModal', [$sessionComponentId]);
        $this->setSessionComponent(SessionComponent::find($sessionComponentId)); // TODO: do we need check place?
    }

    public function moveToSink(): void
    {
        if($this->sessionComponent) {
            $this->sessionComponent->moveToSink();
            $this->dispatch('session-component-moved-to-sink');
            $this->setSessionComponent();
        }
    }
    public function moveToCart(): void
    {
        if($this->sessionComponent) {
            $this->sessionComponent->moveToCart();
            $this->dispatch('session-component-moved-to-cart');
            $this->setSessionComponent();
        }
    }
    public function moveToScales() : void
    {
        if($this->sessionComponent) {
            $this->sessionComponent->moveToScales($this->sessionComponent->component->on_scales_place);
            $this->dispatch('session-component-moved-to-scales');
            $this->setSessionComponent();
        }
    }
    public function close(): void
    {
        $this->setSessionComponent();
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-weighting-table-component');
    }


    public function setSessionComponent(SessionComponent $sessionComponent = null): void
    {
        $this->sessionComponent = $sessionComponent;
    }

}
