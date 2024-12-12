<?php
declare(strict_types=1);


namespace App\Livewire\Stages\CookingStage\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use Livewire\Attributes\On;

trait HasCookingTableChooseMode
{

    public ?SessionComponentPlace $cookingTableChooseMode = null;


    public function setPHMeterChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::onPHMeter);
    }
    public function setBathLeftBoxChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inBathLeftBox);
    }

    public function setBathRightBoxChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inBathRightBox);
    }
    public function setMixerChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inMixer);
    }
    public function setFiltrationBoxChooseMode(): void
    {
        $this->setCookingTableChooseMode(SessionComponentPlace::inFiltrationBox);
    }

    public function disableCookingTableChooseMode(): void
    {
        $this->cookingTableChooseMode = null;
    }

    public function setCookingTableChooseMode(SessionComponentPlace $place): void
    {
        if ($this->cookingTableChooseMode == $place) {
            $this->cookingTableChooseMode = null;
            $this->dispatch('set-cooking-table-choose-mode', null);
        } else {
            $this->cookingTableChooseMode = $place;
            $this->dispatch('set-cooking-table-choose-mode', $place);
        }
    }

    #[On('unset-cooking-table-choose-mode')]
    public function unsetTableChooseMode(): void
    {
        $this->disableCookingTableChooseMode();
    }
}