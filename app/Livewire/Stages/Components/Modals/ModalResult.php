<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalResult extends Component
{
    public bool $isShow = false;

    use HasSession;

    public function mount(string $session)
    {
        $this->setSession($session);
    }

    #[On('hide-modal-result')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    #[On('show-modal-result')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-result');
    }
}
