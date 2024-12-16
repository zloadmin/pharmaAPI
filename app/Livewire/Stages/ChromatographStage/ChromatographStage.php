<?php

namespace App\Livewire\Stages\ChromatographStage;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographStage extends Component
{
    use HasSession;

    public bool $is_set = false;
    public bool $is_turn_on = false;
    public bool $is_open = false;
    public bool $replaced = false;
    public bool $pump = false;
    public bool $injector = false;

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setIsSet();
        $this->setIsTurnOn();
        $this->setIsOpen();
        $this->setReplaced();
        $this->setPump();
        $this->setInjector();
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.chromatograph-stage');
    }

    public function setIsSet(): void
    {
        $this->is_set = $this->sessionModel->chromatograph_is_set;
    }

    public function setIsTurnOn(): void
    {
        $this->is_turn_on = $this->sessionModel->chromatograph_is_turn_on;
    }

    public function setIsOpen(): void
    {
        $this->is_open = $this->sessionModel->chromatograph_is_open;
    }

    public function setReplaced(): void
    {
        $this->replaced = $this->sessionModel->chromatograph_replaced;
    }

    public function setPump(): void
    {
        $this->pump = $this->sessionModel->chromatograph_pump;
    }

    public function setInjector(): void
    {
        $this->injector = $this->sessionModel->chromatograph_injector;
    }

    public function isSetOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographIsSet(true);
        $this->is_set = true;
    }

    public function isTurnOnOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographIsTurnOn(true);
        $this->is_turn_on = true;
    }

    public function isOpenOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographIsOpenOn(true);
        $this->is_open = true;
    }

    public function replacedOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographReplacedOn(true);
        $this->replaced = true;
    }

    public function pumpOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographPumpOn(true);
        $this->pump = true;
    }

    public function injectorOn(): void
    {
        $this->dispatch('show-modal-video', fileName: 'filtration.mp4');
        $this->setSessionChromatographInjectorOn(true);
        $this->injector = true;
    }

    public function run(): void
    {
        $this->redirectRoute('chromatograph-status-page', [$this->session], true, true);
    }
}
