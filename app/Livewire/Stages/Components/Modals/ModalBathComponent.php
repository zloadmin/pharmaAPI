<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableChooseMode;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableMoving;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalBathComponent extends ModalBase
{
    use HasSession;
    use HasCookingTableMoving;
    use HasCookingTableChooseMode;


    public ?SessionComponent $leftBoxSessionComponent = null;
    public ?SessionComponent $rightBoxSessionComponent = null;
    public bool $isShow = false;


    public function mount(string $session): void
    {
        $this->setSession($session);
    }


    #[On('show-modal-bath')]
    public function showModal(): void
    {
        $this->isShow = true;
    }
    #[On('show-modal-ph-meter')]
    #[On('show-modal-mixer')]
    #[On('show-modal-filtration-before')]
    #[On('show-modal-filtration-after')]
    #[On('hide-modal-bath')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function setBathLeftBoxChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inBathLeftBox);
    }
    public function setBathRightBoxChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inBathRightBox);
    }


    public function render()
    {
        return view('livewire.stages.components.modals.modal-bath');
    }




}
