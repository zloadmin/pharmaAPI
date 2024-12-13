<?php

namespace App\Livewire\Stages\Components\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalVideo extends Component
{
    public bool $isShow = false;
    public string $fileName = '';

    #[On('hide-modal-video')]
    public function hideModal(): void
    {
        $this->isShow = false;
        $this->fileName = '';
    }
    #[On('show-modal-video')]
    public function showModal($fileName): void
    {
        $this->isShow = true;
        $this->fileName = $fileName;

    }
    public function render()
    {
        return view('livewire.stages.components.modals.modal-video');
    }
}
