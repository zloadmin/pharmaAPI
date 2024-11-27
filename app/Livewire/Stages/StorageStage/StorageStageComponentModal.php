<?php

namespace App\Livewire\Stages\StorageStage;

use App\Enums\Component\ComponentType;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component as LivewireComponent;

class StorageStageComponentModal extends LivewireComponent
{
    use HasSession;

    public ?Component $component = null;
    public $value = null;

    #[On('show-component-modal')]
    public function showModal($id): void
    {
        Log::info('StorageStageComponentModal::showModal', [$id]);
        $this->setComponent(Component::find($id));
    }

    public function mount(string $session): void
    {
        $this->setSession($session);
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.storage-stage.storage-stage-component-modal');
    }

    public function close(): void
    {
        $this->setComponent();
    }

    public function setComponent(Component $component = null): void
    {
        $this->component = $component;
        $this->value = $this->component ? $component->defaultValue() : null;
    }

    public function addValue(): void
    {
        $this->value = $this->value + $this->component->stepValue();
        if ($this->value > $this->component->maxValue()) {
            $this->value = $this->component->maxValue();
        }
    }

    public function removeValue(): void
    {
        $this->value = $this->value - $this->component->stepValue();
        if ($this->value < $this->component->minValue()) {
            $this->value = $this->component->minValue();
        }
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
        $this->value = $this->component->defaultValue();
    }

    private function storeToCart(): void
    {
        if ($this->component->type == ComponentType::Stuff) {
            for ($i = 0; $i < $this->value; $i++) {
                $this->insertToCart(1);
            }
        } else {
            $this->insertToCart($this->value);
        }

    }

    private function insertToCart($value): void
    {
        SessionComponent::create([
            'session'                             => $this->session,
            'storage_component_id'                => $this->component->id,
            $this->component->getValueFieldName() => $value,
        ]);
    }

    public function rules()
    {
        return [
            'value' => ['required', 'numeric', 'min: ' . $this->component->minValue(), 'max: ' . $this->component->maxValue(),]
        ];
    }
}
