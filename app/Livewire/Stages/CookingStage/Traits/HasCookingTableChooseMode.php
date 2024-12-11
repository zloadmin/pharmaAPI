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
//
//    public function setRightBoxChooseMode(): void
//    {
//        $this->setTableChooseMode(SessionComponentPlace::onScalesRightBox);
//    }
//
//    public function setBottomBoxChooseMode(): void
//    {
//        $this->setTableChooseMode(SessionComponentPlace::onScalesBottomBox);
//    }

//    public function isTableChooseModeBottom(): bool
//    {
//        return $this->tableChooseMode == SessionComponentPlace::onScalesBottomBox;
//    }
//
//    public function isTableChooseModeRight(): bool
//    {
//        return $this->tableChooseMode == SessionComponentPlace::onScalesRightBox;
//    }
//
//    public function isTableChooseModeLeft(): bool
//    {
//        return $this->tableChooseMode == SessionComponentPlace::onScalesLeftBox;
//    }
//
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