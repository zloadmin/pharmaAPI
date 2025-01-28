<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\WeightCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use Illuminate\Http\RedirectResponse;

/**
 * @method moveComponentsToWeightFromTable(LaboratorySession $laboratorySession, array $array)
 * @method calibration(LaboratorySession $laboratorySession)
 * @method weighOnScales(LaboratorySession $laboratorySession, float $FOURTH_WEIGH)
 * @method bicalutamideThirdWeightDoneCalibrated()
 */
trait HasFourthWeightTestCase
{
    const FOURTH_WEIGH = 0.100;

    /**
     * 1 Бикалутамид - легкий - на весах Трифторуксусная кислота 2
     *
     * @return RedirectResponse
     */
    public function bicalutamideFourthWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 2 Бикалутамид - легкий - на весах Трифторуксусная кислота 2 - ОТКАЛИБРОВАН
     *
     * @return RedirectResponse
     */
    public function bicalutamideFourthWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 3 Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН
     *
     * @return RedirectResponse
     */
    public function bicalutamideFourthWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::FOURTH_WEIGH);
        $laboratorySession->checkCookingRoomLock();

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    /**
     * 4 Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН и ОТКАЛИБРОВАН
     *
     * @return RedirectResponse
     */
    public function bicalutamideFourthWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFourthWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    private function bicalutamideFourthWeightDoneCalibrated()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, self::FOURTH_WEIGH);
        $this->calibration($laboratorySession);
        $laboratorySession->checkCookingRoomLock();
        return $laboratorySession;
    }
    private function bicalutamideFourthWeight(LaboratorySession $laboratorySession): LaboratorySession
    {
        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                23 => SessionComponentPlace::onScalesLeftBox,
                41 => SessionComponentPlace::onScalesRightBox,
                45 => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }

}