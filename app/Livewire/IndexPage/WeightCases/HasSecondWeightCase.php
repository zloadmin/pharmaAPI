<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\WeightCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use Illuminate\Http\RedirectResponse;

/**
 * @method bicalutamideFirstWeightDoneCalibrated()
 * @method calibration(LaboratorySession $laboratorySession)
 * @method weighOnScales(LaboratorySession $laboratorySession, float $SECOND_WEIGH)
 * @method moveComponentsToWeightFromTable(LaboratorySession $laboratorySession, array $array)
 */
trait HasSecondWeightCase
{
    const SECOND_WEIGH  = 0.025;

    /**
     * 1 Бикалутамид - легкий - на весах Бикалутамид субстанция
     * @return RedirectResponse
     */
    public function bicalutamideSecondWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 2 Бикалутамид - легкий - на весах Бикалутамид субстанция - ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideSecondWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 3 Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН
     * @return RedirectResponse
     */
    public function bicalutamideSecondWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::SECOND_WEIGH);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 4 Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН и ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideSecondWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    private function bicalutamideSecondWeight(LaboratorySession $laboratorySession): LaboratorySession
    {

        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                26 => SessionComponentPlace::onScalesLeftBox,
                37 => SessionComponentPlace::onScalesRightBox,
                1  => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }
    private function bicalutamideSecondWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::SECOND_WEIGH);
        $this->calibration($laboratorySession);
        return $laboratorySession;
    }

}