<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalFiltrationAfterComponent extends ModalBase
{
    use HasSession;

    public ?SessionComponent $sessionComponent = null;
    public bool $isShow = false;


    public function mount(string $session): void
    {
        $this->setSession($session);
    }


    #[On('show-modal-filtration-after')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-modal-bath')]
    #[On('show-modal-filtration-before')]
    #[On('hide-modal-filtration-after')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }


    public function render()
    {
        return view('livewire.stages.components.modals.modal-filtration-after');
    }




}
