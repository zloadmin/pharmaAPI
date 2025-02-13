<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

trait HasCartChooseMode
{
    public ?SessionComponentPlace $cartChooseModePlace = null;

    public function setCartChooseMode(SessionComponentPlace $place): void
    {
        if ($this->cartChooseModePlace == $place) {
            $this->cartChooseModePlace = null;
            $this->dispatch('set-cart-choose-mode', null);
        } else {
            $this->cartChooseModePlace = $place;
            $this->dispatch('set-cart-choose-mode', $place);
        }
    }
    public function setChromatographExampleLeftBoxChooseMode(): void
    {
        $this->setCartChooseMode(SessionComponentPlace::inChromatographExampleLeftBox);
    }
    public function setChromatographExampleRightBoxChooseMode(): void
    {
        $this->setCartChooseMode(SessionComponentPlace::inChromatographExampleRightBox);
    }
    public function disableCartChooseMode(): void
    {
        $this->cartChooseModePlace = null;
    }

    #[On('unset-cart-choose-mode')]
    public function unsetTableChooseMode(): void
    {
        $this->disableCartChooseMode();
    }


//    public function setLeftBoxChooseMode(): void
//    {
//        $this->setTableChooseMode(SessionComponentPlace::onScalesLeftBox);
//    }
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
//
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
//    public function disableTableChooseMode()
//    {
//        $this->tableChooseMode = null;
//    }
//

//
//    #[On('unset-weighting-table-choose-mode')]
//    public function unsetTableChooseMode(): void
//    {
//        $this->tableChooseMode = null;
//    }

}