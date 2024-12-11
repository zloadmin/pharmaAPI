<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

trait HasTableChooseMode
{
    public ?SessionComponentPlace $tableChooseMode = null;

    public function setLeftBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesLeftBox);
    }

    public function setRightBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesRightBox);
    }

    public function setBottomBoxChooseMode(): void
    {
        $this->setTableChooseMode(SessionComponentPlace::onScalesBottomBox);
    }

    public function isTableChooseModeBottom(): bool
    {
        return $this->tableChooseMode == SessionComponentPlace::onScalesBottomBox;
    }

    public function isTableChooseModeRight(): bool
    {
        return $this->tableChooseMode == SessionComponentPlace::onScalesRightBox;
    }

    public function isTableChooseModeLeft(): bool
    {
        return $this->tableChooseMode == SessionComponentPlace::onScalesLeftBox;
    }

    public function disableTableChooseMode()
    {
        $this->tableChooseMode = null;
    }

    public function setTableChooseMode(SessionComponentPlace $place): void
    {
        if ($this->tableChooseMode == $place) {
            $this->tableChooseMode = null;
            $this->dispatch('set-weighting-table-choose-mode', null);
        } else {
            $this->tableChooseMode = $place;
            $this->dispatch('set-weighting-table-choose-mode', $place);
        }
    }

    #[On('unset-weighting-table-choose-mode')]
    public function unsetTableChooseMode(): void
    {
        $this->tableChooseMode = null;
    }

}