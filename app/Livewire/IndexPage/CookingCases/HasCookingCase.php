<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;

trait HasCookingCase
{

    public function bicalutamideCookingMoveToTableTestCase()
    {
        $laboratorySession = $this->bicalutamideFourthWeightDoneCalibrated();
        $this->moveAllComponentsToCookingTable($laboratorySession);
        return redirect()->route('cooking-stage', $laboratorySession->uuid);
    }
    public function bicalutamideCookingMixAllCleanAndMixedMovedToCartTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixEighthDone();
        $laboratorySession->sessionComponents()->where('is_dirty', true)->update([
            'place' => SessionComponentPlace::inSink
        ]);
        $laboratorySession->sessionComponents()->where('is_mixed', true)->update([
            'place' => SessionComponentPlace::inCart
        ]);
        return redirect()->route('cooking-stage', $laboratorySession->uuid);

    }
}