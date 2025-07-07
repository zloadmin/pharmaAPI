<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Enums\Stages\Stage;
use App\Models\LaboratoryWeightingComponent;

trait HasUnlockStages
{
    use HasSession;

    private function unlockStage(Stage $stage): void
    {
        if ($this->isSessionModelLockedStage($stage)) {
            $this->sessionModel->unlockStage($stage);
            $this->dispatchUnlockedEvent($stage);
        }
    }
    public function unlockStageWeighting(): void
    {
        $this->unlockStage(Stage::weighting);
    }
    public function unlockStageChromatograph(): void
    {
        $this->unlockStage(Stage::chromatograph);
    }

    private function isSessionModelLockedStage(Stage $stage)
    {
        return $this->sessionModel->isLockStage($stage);
    }

//    public function isCookingRoomLocked()
//    {
//        return $this->isSessionModelLockedStage(Stage::cooking);
//    }

    public function checkCookingRoomLock(): void
    {
        if ($this->sessionModel->isCookingRoomLocked() && $this->sessionModel->checkCookingRoomAbleUnlock()) {
            $this->sessionModel->unlockStage(Stage::cooking);
            $this->dispatchUnlockedEvent(Stage::cooking);
        }
    }
    public function checkChromatographRoomLock(): void
    {

        if (
            $this->sessionModel->isCookingRoomUnlocked() &&
            $this->sessionModel->isChromatographRoomLocked() &&
            $this->sessionModel->checkChromatographRoomAbleUnlock()
        ) {
            $this->sessionModel->unlockStage(Stage::chromatograph);
            $this->dispatchUnlockedEvent(Stage::chromatograph);
        }
    }

//    private function unlockStageInSessionModel(Stage $stage): void
//    {
//        $this->sessionModel->update([
//            $stage->sessionModelField() => false
//        ]);
//    }

    private function dispatchUnlockedEvent(Stage $stage): void
    {
        $this->dispatch('stage-unlocked', $stage->value);
    }

//    private function checkCookingRoomAbleUnlock(): bool
//    {
//        if($this->sessionModel->sessionComponents()->weighed()->count() < $this->laboratory->weightingComponents()->count()) {
//            return false;
//        }
//
//        $requiredComponents = $this->laboratory->weightingComponents()->get();
//        $sessionComponents = $this->sessionModel->sessionComponents()->weighed()->get();
//        $requiredComponentIds = [];
//        $sessionComponentIds = [];
//
//        foreach ($requiredComponents as $requiredComponent) {
//            foreach ($sessionComponents as $sessionComponent) {
//                if ($requiredComponent->isFitsBySessionComponent($sessionComponent)) {
//                    if (!isset($requiredComponentIds[$requiredComponent->id]) && !isset($sessionComponentIds[$sessionComponent->id])) {
//                        $requiredComponentIds[$requiredComponent->id] = $sessionComponent->id;
//                        $sessionComponentIds[$sessionComponent->id] = $requiredComponent->id;
//                    }
//                }
//            }
//        }
//
//        return $requiredComponents->count() == count($requiredComponentIds);
//    }
}
