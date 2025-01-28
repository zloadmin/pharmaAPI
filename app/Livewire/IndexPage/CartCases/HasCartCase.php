<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CartCases;


use Illuminate\Http\RedirectResponse;

trait HasCartCase
{
    /**
     * 1 Бикалутамид - легкий - собран на складе
     * @return RedirectResponse
     */
    public function bicalutamideFilledCartTestCase()
    {
        $laboratorySession = $this->bicalutamideFilledCart();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 2 Бикалутамид - легкий - перенесено на стол
     * @return RedirectResponse
     */
    public function bicalutamideAllOnTableTestCase()
    {
        $laboratorySession = $this->bicalutamideFilledCart();
        $this->moveAllComponentsToWeightingTable($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

}