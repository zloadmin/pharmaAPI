<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Livewire\IndexPage\CartCases\HasCartCase;
use App\Livewire\IndexPage\WeightCases\HasFirstWeightCase;
use App\Livewire\IndexPage\WeightCases\HasFourthWeightTestCase;
use App\Livewire\IndexPage\WeightCases\HasSecondWeightCase;
use App\Livewire\IndexPage\WeightCases\HasThirdWeightTestCase;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Support\Str;

trait HasTestCases
{

    use HasCartCase;
    use HasFirstWeightCase;
    use HasSecondWeightCase;
    use HasThirdWeightTestCase;
    use HasFourthWeightTestCase;

    public $testCases = [];

    public function mountHasTestCases(): void
    {
        $this->testCases = [
            ['title' => 'Бикалутамид - легкий - собран на складе', 'method' => 'bicalutamideFilledCartTestCase'],
            ['title' => 'Бикалутамид - легкий - перенесено на стол', 'method' => 'bicalutamideAllOnTableTestCase'],

            ['title' => 'Бикалутамид - легкий - на весах Бикалутамид СО', 'method' => 'bicalutamideFirstWeightTestCase'],
            ['title' => 'Бикалутамид - легкий - на весах Бикалутамид СО - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН', 'method' => 'bicalutamideFirstWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий - на весах Бикалутамид субстанция', 'method' => 'bicalutamideSecondWeightTestCase'],
            ['title' => 'Бикалутамид - легкий - на весах Бикалутамид субстанция - ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН', 'method' => 'bicalutamideSecondWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий - на весах Трифторуксусная кислота', 'method' => 'bicalutamideThirdWeightTestCase'],
            ['title' => 'Бикалутамид - легкий - на весах Трифторуксусная кислота - ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН', 'method' => 'bicalutamideThirdWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightDoneCalibratedTestCase'],

            ['title' => 'Бикалутамид - легкий - на весах Трифторуксусная кислота 2', 'method' => 'bicalutamideFourthWeightTestCase'],
            ['title' => 'Бикалутамид - легкий - на весах Трифторуксусная кислота 2 - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightCalibratedTestCase'],
            ['title' => 'Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН', 'method' => 'bicalutamideFourthWeightDoneTestCase'],
            ['title' => 'Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightDoneCalibratedTestCase'],
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

    private function weighOnScales(LaboratorySession $session, $value): void
    {
        $left = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesLeftBox)->first();
        $right = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesRightBox)->first();
        $bottom = $session->sessionComponents()->where('place', SessionComponentPlace::onScalesBottomBox)->first();
        if ($left && $right && $bottom) {
            SessionComponent::weigh($left, $right, $bottom, $value);
        }
        SessionComponent::cleanScales($left, $right, $bottom);
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

    private function calibration(LaboratorySession $session): void
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