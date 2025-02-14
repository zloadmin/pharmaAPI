<?php

namespace App\Livewire\Stages\Components\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalResult extends Component
{
    public bool $isShow = false;


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
