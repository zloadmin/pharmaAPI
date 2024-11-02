<?php

namespace App\Livewire\Stages\StorageStage;

use App\Livewire\Traits\HasSession;
use App\Models\CartStorageComponent;
use App\Models\StorageComponent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class StorageStageComponentModal extends Component
{
    use HasSession;

    public ?StorageComponent $component = null;
    public $value = null;

    #[On('show-component-modal')]
    public function showModal($id): void
    {
        Log::info('StorageStageComponentModal::showModal', [$id]);
        $this->setComponent(StorageComponent::find($id));
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

    public function setComponent(StorageComponent $component = null): void
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
        CartStorageComponent::create([
            'session'                             => $this->session,
            'storage_component_id'                => $this->component->id,
            $this->component->getValueFieldName() => $this->value
        ]);
    }

    public function rules()
    {
        return [
            'value' => ['required', 'numeric', 'min: ' . $this->component->minValue(), 'max: ' . $this->component->maxValue(),]
        ];
    }
}
