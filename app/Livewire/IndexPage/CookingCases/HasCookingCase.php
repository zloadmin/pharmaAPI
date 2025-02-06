<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;

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
        $laboratorySession = $this->bicalutamideCookingMixAllCleanAndMixedMovedToCart();
        return redirect()->route('cooking-stage', $laboratorySession->uuid);
    }
    private function bicalutamideCookingMixAllCleanAndMixedMovedToCart() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixEighthDone();
        $laboratorySession->sessionComponents()->where('is_dirty', true)->update([
            'place' => SessionComponentPlace::inSink
        ]);
        $laboratorySession->sessionComponents()->where('is_mixed', true)->update([
            'place' => SessionComponentPlace::inCart
        ]);
        return  $laboratorySession;
    }
}