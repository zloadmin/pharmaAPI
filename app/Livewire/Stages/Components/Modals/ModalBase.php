<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Models\Component;
use Livewire\Component as LivewireComponent;

class ModalBase extends LivewireComponent
{








//    use HasSession;
//
////    public ?StorageComponent $component = null;
////    public $value = null;
////
//    #[On('show-modal-move-to-table')]
//    public function showModal($id): void
//    {
//        Log::info('ModalMoveToTableComponent::showModal', [$id]);
////        $this->setComponent(StorageComponent::find($id));
//    }
//
//    public function mount(string $session): void
//    {
//        $this->setSession($session);
//    }
//
//    #[Layout('components.layouts.web')]
//    public function render()
//    {
//        return view('livewire.stages.components.modal-move-to-table');
//    }
//
////    public function close(): void
////    {
////        $this->setComponent();
////    }
////
////    public function setComponent(StorageComponent $component = null): void
////    {
////        $this->component = $component;
////        $this->value = $this->component ? $component->defaultValue() : null;
////    }
////
////    public function addValue(): void
////    {
////        $this->value = $this->value + $this->component->stepValue();
////        if ($this->value > $this->component->maxValue()) {
////            $this->value = $this->component->maxValue();
////        }
////    }
////
////    public function removeValue(): void
////    {
////        $this->value = $this->value - $this->component->stepValue();
////        if ($this->value < $this->component->minValue()) {
////            $this->value = $this->component->minValue();
////        }
////    }
////
////    public function refreshCart(): void
////    {
////        $this->dispatch('storage-component-added-in-cart');
////    }
////
////    public function addToCart(): void
////    {
////        $this->validate();
////        $this->storeToCart();
////        $this->resetValue();
////        $this->refreshCart();
////    }
////
////    public function resetValue(): void
////    {
////        $this->value = $this->component->defaultValue();
////    }
////
////    private function storeToCart(): void
////    {
////        if ($this->component->type == StorageComponentType::Stuff) {
////            for ($i = 0; $i < $this->value; $i++) {
////                $this->insertToCart(1);
////            }
////        } else {
////            $this->insertToCart($this->value);
////        }
////
////    }
////
////    private function insertToCart($value): void
////    {
////        CartStorageComponent::create([
////            'session'                             => $this->session,
////            'storage_component_id'                => $this->component->id,
////            $this->component->getValueFieldName() => $value,
////        ]);
////    }
////
////    public function rules()
////    {
////        return [
////            'value' => ['required', 'numeric', 'min: ' . $this->component->minValue(), 'max: ' . $this->component->maxValue(),]
////        ];
////    }
}
