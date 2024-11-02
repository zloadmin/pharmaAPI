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
        $this->setCartStageComponent();
    }

    public function render(): View
    {
        return view('livewire.stages.storage-stage.storage-stage-component-cart');
    }

    private function setCartStageComponent(): void
    {
        $this->cartItems = CartStorageComponent::with('component')->bySession($this->session)->latest()->get();
    }

    public function getItem($id)
    {
        return CartStorageComponent::bySession($this->session)->where('id', $id)->first();
    }

    #[On('storage-component-added-in-cart')]
    public function updatePostList(): void
    {
        $this->setCartStageComponent($this->session);
    }

    public function removeItem($id): void
    {
        if ($item = $this->getItem($id)) {
            $item->delete();
            $this->setCartStageComponent();
        }
    }

}

