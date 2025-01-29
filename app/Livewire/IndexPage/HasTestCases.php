<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Livewire\IndexPage\CartCases\HasCartCase;
use App\Livewire\IndexPage\CookingCases\HasCookingCase;
use App\Livewire\IndexPage\CookingCases\HasCookingFirstCase;
use App\Livewire\IndexPage\CookingCases\HasCookingSecondCase;
use App\Livewire\IndexPage\CookingCases\HasCookingThirdCase;
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
    use HasCookingCase;
    use HasCookingFirstCase;
    use HasCookingSecondCase;
    use HasCookingThirdCase;

    public $testCases = [];

    public function mountHasTestCases(): void
    {
        $this->testCases = [
            ['title' => '[склад]Бикалутамид - легкий - собран на складе', 'method' => 'bicalutamideFilledCartTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - перенесено на стол весовой', 'method' => 'bicalutamideAllOnTableTestCase'],

            ['title' => '[весовая]Бикалутамид - легкий - на весах Бикалутамид СО', 'method' => 'bicalutamideFirstWeightTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - на весах Бикалутамид СО - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightCalibratedTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН', 'method' => 'bicalutamideFirstWeightDoneTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Бикалутамид СО - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFirstWeightDoneCalibratedTestCase'],

            ['title' => '[весовая]Бикалутамид - легкий - на весах Бикалутамид субстанция', 'method' => 'bicalutamideSecondWeightTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - на весах Бикалутамид субстанция - ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightCalibratedTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН', 'method' => 'bicalutamideSecondWeightDoneTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Бикалутамид субстанция - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideSecondWeightDoneCalibratedTestCase'],

            ['title' => '[весовая]Бикалутамид - легкий - на весах Трифторуксусная кислота', 'method' => 'bicalutamideThirdWeightTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - на весах Трифторуксусная кислота - ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightCalibratedTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН', 'method' => 'bicalutamideThirdWeightDoneTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Трифторуксусная кислота - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideThirdWeightDoneCalibratedTestCase'],

            ['title' => '[весовая]Бикалутамид - легкий - на весах Трифторуксусная кислота 2', 'method' => 'bicalutamideFourthWeightTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - на весах Трифторуксусная кислота 2 - ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightCalibratedTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН', 'method' => 'bicalutamideFourthWeightDoneTestCase'],
            ['title' => '[весовая]Бикалутамид - легкий - Трифторуксусная кислота 2 - ВЗВЕШАН и ОТКАЛИБРОВАН', 'method' => 'bicalutamideFourthWeightDoneCalibratedTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - перенесено на стол приготовление растворов', 'method' => 'bicalutamideCookingMoveToTableTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление Подвижной фазы А - перенесено в смешивание', 'method' => 'bicalutamideCookingMixFirstStageMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление Подвижной фазы А - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixFirstStageDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление Подвижной фазы Б - перенесено в смешивание', 'method' => 'bicalutamideCookingMixSecondStageMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление Подвижной фазы Б - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixSecondStageDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление Химический стакан 200 мл с растворителем - перенесено в смешивание', 'method' => 'bicalutamideCookingMixThirdStageMovedOnMixTestCase'],

        ];
    }


    private function bicalutamideFilledCart(LaboratorySession $laboratorySession = null): LaboratorySession
    {
        $laboratory = Laboratory::findOrFail(2);
        $laboratorySession = $laboratorySession ? $laboratorySession : $this->createSession($laboratory);
        $laboratorySession->refresh();
        $laboratorySession->unlockWeighting();
        $this->fillCart($laboratory, $laboratorySession,
            [
                // weight stage
                26, // Бюкс
                26, // Бюкс
                1, // Шпатель
                1, // Шпатель
                38, // Бикалутамид СО
                37, // Бикалутамид, субстанция
                23, // Химический стакан
                23, // Химический стакан
                45, // Воронка малая
                45, // Воронка малая
                41, // Трифторуксусная кислота
                // cooking stage mix 1
                27, // Дестилированная вода - inMixBoxOne
                4, // Мерная колба 1л - inMixBoxThree
                2, // Воронка средняя - inMixBoxTwo
                // cooking stage mix 2
                42, // Ацетонитрил
                2, // Воронка средняя
                4, // Мерная колба
                // cooking stage mix 3
                23, // Химический стакан
                2, // Воронка средняя
            ]
        );
        return $laboratorySession;
    }

    private function moveAllComponentsToWeightingTable(LaboratorySession $session): void
    {
        foreach ($session->sessionComponents as $sessionComponent) {
            $sessionComponent->moveToWeightingTable();
        }
    }

    private function moveAllComponentsToCookingTable(LaboratorySession $session): void
    {
        foreach ($session->sessionComponents as $sessionComponent) {
            $sessionComponent->moveToCookingTable();
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

    private function mix(LaboratorySession $session): SessionComponent
    {
        $one = $session->sessionComponents()->where('place', SessionComponentPlace::inMixBoxOne)->first();
        $two = $session->sessionComponents()->where('place', SessionComponentPlace::inMixBoxTwo)->first();
        $three = $session->sessionComponents()->where('place', SessionComponentPlace::inMixBoxThree)->first();
        $four = $session->sessionComponents()->where('place', SessionComponentPlace::inMixBoxFour)->first();
        $mixedComponent = SessionComponent::mix($session, $one, $two, $three, $four);
        SessionComponent::cleanMixer($one, $two, $three, $four);
        return $mixedComponent;
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

    private function moveToMixComponent(
        LaboratorySession     $session,
        SessionComponentPlace $place,
        array                 $wheres
    ): void
    {
        $sessionComponent = $session->sessionComponents();
        $sessionComponent->where('is_dirty', false);
        foreach ($wheres as $field => $value) {
            $sessionComponent->where($field, $value);
        }
        $sessionComponent = $sessionComponent->first();
        if(is_null($sessionComponent)) {
            dd($place, $wheres);
        }
        $sessionComponent->changePlace($place);
    }

    private function moveToMix(LaboratorySession $session, array $components)
    {
        foreach ($components as $place => $component_id) {
            if ($place != SessionComponentPlace::inMixBoxFour->value) {
                $sessionComponent = $session->sessionComponents()
                    ->where('component_id', $component_id)
                    ->where('is_dirty', false)
                    ->where('is_weighed', false)
                    ->first();
                $sessionComponent->changePlace(SessionComponentPlace::{$place});
            } else {
                $mixedComponent = $session->sessionComponents()
                    ->where('is_weighed', true)
                    ->where('weighed_right_component_id', $component_id)
                    ->first();

                $mixedComponent->changePlace(SessionComponentPlace::{$place});
            }
        }
    }
}