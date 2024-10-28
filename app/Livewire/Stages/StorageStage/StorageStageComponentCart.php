<?php

namespace App\Livewire\Stages\StorageStage;

use App\Livewire\Traits\HasSession;
use App\Models\CartStorageComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class StorageStageComponentCart extends Component
{
    use HasSession;

    public Collection $cartItems;

    public function mount(string $session): void
    {
        $this->setSession($session);
        $this->setCartStageComponent($session);
    }

    public function render() : View
    {
        return view('livewire.stages.storage-stage.storage-stage-component-cart');
    }

    private function setCartStageComponent(string $session): void
    {
        $this->cartItems = CartStorageComponent::with('component')->bySession($session)->latest()->get();
    }

    #[On('storage-component-added-in-cart')]
    public function updatePostList(): void
    {
        $this->setCartStageComponent($this->session);
    }
}
