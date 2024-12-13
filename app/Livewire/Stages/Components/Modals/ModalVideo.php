<?php

namespace App\Livewire\Stages\Components\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalVideo extends Component
{
    public bool $isShow = false;
    public string $url = '';

    #[On('hide-modal-video')]
    public function hideModal(): void
    {
        $this->isShow = false;
        $this->url = '';
    }
    #[On('show-modal-video')]
    public function showModal($url): void
    {
        $this->isShow = true;
        $this->url = $url;

    }
    public function render()
    {
        return view('livewire.stages.components.modals.modal-video');
    }
}
