<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\WeightCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use Illuminate\Http\RedirectResponse;

/**
 * @method bicalutamideFilledCart()
 * @method moveAllComponentsToTable($laboratorySession)
 * @method moveComponentsToWeightFromTable($laboratorySession, array $array)
 * @method calibration(LaboratorySession $laboratorySession)
 * @method weighOnScales(LaboratorySession $laboratorySession, float $FIRST_WEIGH)
 */
trait HasFirstWeightCase
{
    const FIRST_WEIGH  = 0.020;

    /**
     * 1 Бикалутамид - легкий - на весах Бикалутамид СО
     * @return RedirectResponse
     */
    public function bicalutamideFirstWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }


    /**
     * 2 Бикалутамид - легкий - на весах Бикалутамид СО - ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideFirstWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 3 Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН', 'method
     * @return RedirectResponse
     */
    public function bicalutamideFirstWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::FIRST_WEIGH);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 4 Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН и ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideFirstWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    private function bicalutamideFirstWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::FIRST_WEIGH);
        $this->calibration($laboratorySession);
        return  $laboratorySession;
    }

    private function bicalutamideFirstWeight(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFilledCart();
        $this->moveAllComponentsToTable($laboratorySession);
        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                26 => SessionComponentPlace::onScalesLeftBox,
                38 => SessionComponentPlace::onScalesRightBox,
                1  => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }

}