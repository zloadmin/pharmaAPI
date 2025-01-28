<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


trait HasCookingCase
{

    public function bicalutamideCookingMoveToTableTestCase()
    {
        $laboratorySession = $this->bicalutamideFourthWeightDoneCalibrated();
        $this->moveAllComponentsToCookingTable($laboratorySession);
        return redirect()->route('cooking-stage', $laboratorySession->uuid);
    }
}