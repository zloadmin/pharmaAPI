<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\WeightCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use Illuminate\Http\RedirectResponse;

/**
 * @method calibration(LaboratorySession $laboratorySession)
 * @method weighOnScales(LaboratorySession $laboratorySession, $THIRD_WEIGH)
 * @method bicalutamideSecondWeightDoneCalibrated()
 * @method moveComponentsToWeightFromTable(LaboratorySession $laboratorySession, array $array)
 */
trait HasThirdWeightTestCase
{
    const THIRD_WEIGH  = 0.100;

    /**
     * 1 Бикалутамид - легкий - на весах Трифторуксусная кислота
     * @return RedirectResponse
     */
    public function bicalutamideThirdWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 2 Бикалутамид - легкий - на весах Трифторуксусная кислота - ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideThirdWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 3 Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН
     * @return RedirectResponse
     */
    public function bicalutamideThirdWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::THIRD_WEIGH);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 4 Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН и ОТКАЛИБРОВАН
     * @return RedirectResponse
     */
    public function bicalutamideThirdWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    private function bicalutamideThirdWeight(LaboratorySession $laboratorySession): LaboratorySession
    {
        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                25 => SessionComponentPlace::onScalesLeftBox,
                41 => SessionComponentPlace::onScalesRightBox,
                45  => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }
    private function bicalutamideThirdWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::THIRD_WEIGH);
        $this->calibration($laboratorySession);
        return $laboratorySession;
    }


}