<?php

namespace App\Livewire\Stages\StorageStage\StorageComponents;

use App\Livewire\Traits\HasSession;
use App\Models\CartStorageComponent;
use App\Models\StorageComponent;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MainComponent extends Component
{
    use HasSession;

    #[Validate('required|numeric|min:0.00001|max:10')]
    public $value = 0.00001;

    public StorageComponent $component;

    public function mount($component, $session): void
    {
        $this->setComponent($component);
        $this->setSession($session);
    }

    private function setComponent(StorageComponent $component): void
    {
        $this->component = $component;
    }

    public function refreshCart(): void
    {
        $this->dispatch('storage-component-added-in-cart');
    }

    public function addToCart(): void
    {
        $this->validate();
        $this->storeToCart();
        $this->resetValue();
        $this->refreshCart();
    }

    public function resetValue(): void
    {
        $this->value = 0.00001;
    }

    public function getValueFieldName()
    {
        switch (get_class($this)) {
            case ComponentStuff::class:
                return 'valueStuff';
            case ComponentLoose::class:
                return 'valueLoose';
            case ComponentLiquid::class:
                return 'valueLiquid';
        }
    }

    private function storeToCart(): void
    {
        $exist = $this->getExistsInCart();
        if ($exist) {
            $this->updateInCart($exist);
        } else {
            $this->createInCart();
        }

    }

    private function getExistsInCart(): ?CartStorageComponent
    {
        return CartStorageComponent::where('session', $this->session)
            ->where('storage_component_id', $this->component->id)
            ->first();
    }

    private function updateInCart(CartStorageComponent $exist): void
    {
        $field = $this->getValueFieldName();
        $exist->update([
            $field => $exist->{$field} + $this->value
        ]);
    }

    private function createInCart(): void
    {
        CartStorageComponent::create([
            'session'                  => $this->session,
            'storage_component_id'     => $this->component->id,
            $this->getValueFieldName() => $this->value
        ]);
    }
}
