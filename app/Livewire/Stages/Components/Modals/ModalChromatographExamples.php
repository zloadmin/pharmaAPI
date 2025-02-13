<?php

namespace App\Livewire\Stages\Components\Modals;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableChooseMode;
use App\Livewire\Stages\CookingStage\Traits\HasCookingTableMoving;
use App\Livewire\Traits\HasCartChooseMode;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use App\Models\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ModalChromatographExamples extends ModalBase
{
    use HasSession;
    use HasCartChooseMode;



    public ?SessionComponent $leftBoxSessionComponent = null;
    public ?SessionComponent $rightBoxSessionComponent = null;

//
//    public int $temperature = 0;
//    public int $seconds = 0;

    public bool $isShow = false;


    public function mount(string $session, bool $isShow = false): void
    {
        $this->init($session);
        $this->isShow = $isShow;
    }

    public function init(string $session): void
    {
        $this->setSession($session);
        $this->setLeftBoxSessionComponent();
        $this->setRightBoxSessionComponent();
//        $this->disableCookingTableChooseMode();

    }


    #[On('session-component-moved-to-chromatograph-example')]
    #[On('session-component-moved-to-cart')]
    public function updateComponents(): void
    {
        $this->init($this->session);
    }

    public function getSessionComponentByPlace(SessionComponentPlace $place): ?SessionComponent
    {
        return SessionComponent::bySession($this->session)
            ->byPlace($place)
            ->first();
    }

    public function moveToCart(SessionComponentPlace $place)
    {
        $sessionComponent = $this->getSessionComponentByPlace($place);

        if ($sessionComponent) {
            $sessionComponent->moveToCart();
            $this->dispatch('session-component-moved-to-cart');
        }
    }
    #[On('show-modal-chromatograph-examples')]
    public function showModal(): void
    {
        $this->isShow = true;
    }


    #[On('hide-modal-chromatograph-examples')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function render()
    {
        return view('livewire.stages.components.modals.modal-chromatograph-examples');
    }

    private function setLeftBoxSessionComponent(): void
    {

        $this->leftBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inChromatographExampleLeftBox()->first();
    }

    private function setRightBoxSessionComponent(): void
    {
        $this->rightBoxSessionComponent = SessionComponent::with('component')->bySession($this->session)->inChromatographExampleRightBox()->first();
    }


    public function run(): void
    {
        $this->hideModal();
        $this->sessionModel->setChromatographStatusIntroduceSampleDone();
        $this->dispatch('modal-chromatograph-examples-updated');
    }


}
