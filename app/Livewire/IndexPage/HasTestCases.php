<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Support\Str;

trait HasTestCases
{

    public $testCases = [
        ['title' => 'Бикалутамид - легкий  - собран на складе', 'method' => 'bicalutamideFilledCartTestCase'],
        //        ['title' => 'этап весовая (собрано все на складе)', 'method' => 'filledCartTestCase'],
    ];

    public function mountHasTestCases()
    {
        $this->testCases = [
            ['title' => 'Бикалутамид - легкий  - собран на складе', 'method' => 'bicalutamideFilledCartTestCase'],
            ['title' => 'Бикалутамид - легкий  - перенесено на стол', 'method' => 'bicalutamideAllOnTableTestCase'],

            ['title' => 'Бикалутамид - легкий  - на весах Бикалутамид СО', 'method' => 'bicalutamideFirstWeightTestCase'],
            ['title' => 'Бикалутамид - легкий  - на весах Бикалутамид СО - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий  - Бикалутамид СО - ВЗВЕШАН', 'method' => 'bicalutamideFirstWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий  - Бикалутамид СО - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий  - на весах Бикалутамид субстанция', 'method' => 'bicalutamideSecondWeightTestCase'],
            ['title' => 'Бикалутамид - легкий  - на весах Бикалутамид субстанция - ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий  - Бикалутамид субстанция - ВЗВЕШАН', 'method' => 'bicalutamideSecondWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий  - Бикалутамид субстанция - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий  - на весах Трифторуксусная кислота', 'method' => 'bicalutamideThirdWeightTestCase'],
            ['title' => 'Бикалутамид - легкий  - на весах Трифторуксусная кислота - ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий  - Трифторуксусная кислота - ВЗВЕШАН', 'method' => 'bicalutamideThirdWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий  - Трифторуксусная кислота - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий  - на весах Трифторуксусная кислота 2', 'method' => 'bicalutamideFourthWeightTestCase'],
            ['title' => 'Бикалутамид - легкий  - на весах Трифторуксусная кислота 2 - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий  - Трифторуксусная кислота 2 - ВЗВЕШАН', 'method' => 'bicalutamideFourthWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий  - Трифторуксусная кислота 2 - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightDoneCalibratedTestCase'],
        ];
    }

    private function bicalutamideFilledCart(LaboratorySession $laboratorySession = null): LaboratorySession
    {
        $laboratory = Laboratory::findOrFail(2);
        $laboratorySession = $laboratorySession ? $laboratorySession : $this->createSession($laboratory);
        $laboratorySession->refresh();
        $laboratorySession->unlockWeighting();
        $this->fillCart($laboratory, $laboratorySession, [26, 26, 1, 1, 38, 37, 23, 23, 45, 45, 41]);
        return $laboratorySession;
    }

    private function moveAllComponentsToTable(LaboratorySession $session): void
    {
        foreach ($session->sessionComponents as $sessionComponent) {
            $sessionComponent->moveToWeightingTable();
        }
    }

    private function moveComponentsToWeightFromTable(LaboratorySession $session, array $components): void
    {
        foreach ($components as $componentID => $place) {
            $component = $session->sessionComponents()
                ->where('component_id', $componentID)
                ->where('is_dirty', false)
                ->where('is_weighed', false)
                ->where('place', SessionComponentPlace::onWeightingTable)
                ->first();
            $component->changePlace($place);
        }
    }

    public function bicalutamideFilledCartTestCase()
    {
        $laboratorySession = $this->bicalutamideFilledCart();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    public function bicalutamideAllOnTableTestCase()
    {
        $laboratorySession = $this->bicalutamideFilledCart();
        $this->moveAllComponentsToTable($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
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
    private function bicalutamideThirdWeight(LaboratorySession $laboratorySession): LaboratorySession
    {

        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                23 => SessionComponentPlace::onScalesLeftBox,
                41 => SessionComponentPlace::onScalesRightBox,
                45  => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }
    private function bicalutamideFourthWeight(LaboratorySession $laboratorySession): LaboratorySession
    {

        $this->moveComponentsToWeightFromTable($laboratorySession,
            [
                23 => SessionComponentPlace::onScalesLeftBox,
                41 => SessionComponentPlace::onScalesRightBox,
                45  => SessionComponentPlace::onScalesBottomBox,
            ]);
        return $laboratorySession;
    }

    public function bicalutamideFirstWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideSecondWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideThirdWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideFourthWeightTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideFourthWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    public function bicalutamideFourthWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);
        $laboratorySession->checkCookingRoomLock();

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideFourthWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideFourthWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);
        $this->calibration($laboratorySession);
        $laboratorySession->checkCookingRoomLock();

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }

    public function bicalutamideFirstWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideSecondWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideThirdWeightCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }


    private function weighOnScales(LaboratorySession $session, $value)
    {
        $left = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesLeftBox)->first();
        $right = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesRightBox)->first();
        $bottom = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesBottomBox)->first();
        if ($left && $right && $bottom) {
            SessionComponent::weigh($left, $right, $bottom, $value);
        }
        SessionComponent::cleanScales($left, $right, $bottom);
    }

    public function bicalutamideFirstWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideSecondWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    public function bicalutamideThirdWeightDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);

        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    private function bicalutamideThirdWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideThirdWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);
        $this->calibration($laboratorySession);
        return $laboratorySession;
    }
    public function bicalutamideThirdWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideThirdWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    private function bicalutamideFirstWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFirstWeight();
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);
        $this->calibration($laboratorySession);
        return  $laboratorySession;
    }
    public function bicalutamideFirstWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }
    private function bicalutamideSecondWeightDoneCalibrated() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFirstWeightDoneCalibrated();
        $laboratorySession = $this->bicalutamideSecondWeight($laboratorySession);
        $this->calibration($laboratorySession);
        $this->weighOnScales($laboratorySession, 0.01);
        $this->calibration($laboratorySession);
        return $laboratorySession;
    }
    public function bicalutamideSecondWeightDoneCalibratedTestCase()
    {
        $laboratorySession = $this->bicalutamideSecondWeightDoneCalibrated();
        return redirect()->route('weighting-stage', $laboratorySession->uuid);
    }


    private function fillCart(Laboratory $laboratory, LaboratorySession $laboratorySession, array $ids): void
    {

        foreach ($ids as $fillCartId) {
            $laboratorySession->sessionComponents()->create([
                'place'        => SessionComponentPlace::inCart,
                'component_id' => $fillCartId,
            ]);
        }
    }

    private function createSession(Laboratory $laboratory): LaboratorySession
    {
        return LaboratorySession::create([
            'user_id'       => 1,
            'uuid'          => Str::uuid(),
            'laboratory_id' => $laboratory->id
        ]);
    }

    public function calibration(LaboratorySession $session)
    {
        $weight = 0.0;
        $left = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesLeftBox)->first();
        if ($left && $left->component) {
            $weight = $weight + $left->component->weight;
        }
        $right = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesRightBox)->first();
        if ($right && $right->component) {
            $weight = $weight + $right->component->weight;
        }
        $bottom = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesBottomBox)->first();
        if ($bottom && $bottom->component) {
            $weight = $weight + $bottom->component->weight;
        }

        $session->update([
            'scales_weight_calibration' => $weight
        ]);
    }
}