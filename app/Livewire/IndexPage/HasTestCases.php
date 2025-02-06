<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Livewire\IndexPage\CartCases\HasCartCase;
use App\Livewire\IndexPage\CookingCases\HasCookingCase;
use App\Livewire\IndexPage\CookingCases\HasCookingEighthCase;
use App\Livewire\IndexPage\CookingCases\HasCookingFifthCase;
use App\Livewire\IndexPage\CookingCases\HasCookingFirstCase;
use App\Livewire\IndexPage\CookingCases\HasCookingFourthCase;
use App\Livewire\IndexPage\CookingCases\HasCookingNinthCase;
use App\Livewire\IndexPage\CookingCases\HasCookingSecondCase;
use App\Livewire\IndexPage\CookingCases\HasCookingSeventhCase;
use App\Livewire\IndexPage\CookingCases\HasCookingSixthCase;
use App\Livewire\IndexPage\CookingCases\HasCookingThirdCase;
use App\Livewire\IndexPage\FiltrationExamplesCases\HasFiltrationExampleFirstCase;
use App\Livewire\IndexPage\FiltrationExamplesCases\HasFiltrationExampleSecondCase;
use App\Livewire\IndexPage\FiltrationMobilePhase\HasFiltrationMobilePhaseFirstCase;
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

    // Weight
    use HasFirstWeightCase;
    use HasSecondWeightCase;
    use HasThirdWeightTestCase;
    use HasFourthWeightTestCase;

    // Mixing
    use HasCookingCase;
    use HasCookingFirstCase;
    use HasCookingSecondCase;
    use HasCookingThirdCase;
    use HasCookingFourthCase;
    use HasCookingFifthCase;
    use HasCookingSixthCase;
    use HasCookingSeventhCase;
    use HasCookingEighthCase;

    // Filtration Examples
    use HasFiltrationExampleFirstCase;
    use HasFiltrationExampleSecondCase;

    // Filtration Mobile Phase
    use HasFiltrationMobilePhaseFirstCase;


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
            ['title' => 'ПОВТОР 4 РАЗА [Приготовление растворов]Бикалутамид - легкий - приготовление Химический стакан 200 мл с растворителем - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixThirdStageDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы 50 мл с промежуточным испытуемым раствором бикалутамида - перенесено в смешивание', 'method' => 'bicalutamideCookingMixFourthMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы 50 мл с промежуточным испытуемым раствором бикалутамида - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixFourthDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 10 мл с готовым испытуемым раствором бикалутамида - перенесено в смешивание', 'method' => 'bicalutamideCookingMixFifthMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 10 мл с готовым испытуемым раствором бикалутамида - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixFifthDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 10 мл с промежуточным раствором СО бикалутамида - перенесено в смешивание', 'method' => 'bicalutamideCookingMixSixthMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 10 мл с промежуточным раствором СО бикалутамида - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixSixthDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 20 мл с готовым раствором СО бикалутамида - перенесено в смешивание', 'method' => 'bicalutamideCookingMixSeventhMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление мерной колбы на 20 мл с готовым раствором СО бикалутамида - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixSeventhDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление химического стакана с готовой конечной подвижной фазой - перенесено в смешивание', 'method' => 'bicalutamideCookingMixEighthMovedOnMixTestCase'],
            ['title' => '[Приготовление растворов]Бикалутамид - легкий - приготовление химического стакана с готовой конечной подвижной фазой - смешено, перенесено в инвентарь', 'method' => 'bicalutamideCookingMixEighthDoneTestCase'],

            ['title' => '[Приготовление растворов]Бикалутамид - легкий - ВСЕ РЕЗУЛЬТАТЫ СМЕШЕНИЯ В ИНВЕНТАРЕ, ВСЕ ГРЯЗНОЕ В МОЙКЕ, ОСТАЛЬНОЕ НА СТОЛЕ', 'method' => 'bicalutamideCookingMixAllCleanAndMixedMovedToCartTestCase'],

            ['title' => '[Фильтрация испытуемых образцов]Бикалутамид - легкий - приготовление шприца для ввода (СО бикалутамида) - перенесено в фильтр', 'method' => 'bicalutamideFiltrationExampleFirstMovedOnFilterExampleTestCase'],
            ['title' => '[Фильтрация испытуемых образцов]Бикалутамид - легкий - приготовление шприца для ввода (СО бикалутамида) - отфильтровано, перенесено в инвентарь', 'method' => 'bicalutamideFiltrationExampleFirstFilteredExampleTestCase'],

            ['title' => '[Фильтрация испытуемых образцов]Бикалутамид - легкий - приготовление шприца для ввода (испыт р-р бикалутамида) - перенесено в фильтр', 'method' => 'bicalutamideFiltrationExampleSecondMovedOnFilterExampleTestCase'],
            ['title' => '[Фильтрация испытуемых образцов]Бикалутамид - легкий - приготовление шприца для ввода (испыт р-р бикалутамида) - отфильтровано, перенесено в инвентарь', 'method' => 'bicalutamideFiltrationExampleSecondFilteredExampleTestCase'],

            ['title' => '[Фильтрация подвижной фазы]Бикалутамид - легкий - приготовление бутыля с ПФ - перенесено в фильтр', 'method' => 'bicalutamideFiltrationMobilePhaseFirstMovedOnFilterMobilePhaseTestCase'],
            ['title' => '[Фильтрация подвижной фазы]Бикалутамид - легкий - приготовление бутыля с ПФ - отфильтровано, перенесено в инвентарь', 'method' => 'bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhaseTestCase'],
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
                // cooking stage mix 3 // 4 times
                23, // Химический стакан
                2, // Воронка средняя
                23, // Химический стакан
                2, // Воронка средняя
                23, // Химический стакан
                2, // Воронка средняя
                23, // Химический стакан
                2, // Воронка средняя

                // cooking stage mix 4
                19, // Мерная колба 0.50
                2, // Воронка средняя
                // cooking stage mix 5
                22, // Мерная колба 0.10
                2, // Воронка средняя
                // cooking stage mix 6
                22, // Мерная колба 0.10
                2, // Воронка средняя
                // cooking stage mix 7
                21, // Мерная колба 0.10
                2, // Воронка средняя
                // cooking stage mix 8
                23, // Химический стакан
                2, // Воронка средняя
                // filtration example 1
                30, // Шприц для фильтрации
                29, // Шприц для ввода
                25, // Химический стакан 50 мл
                // filtration example 2
                30, // Шприц для фильтрации
                29, // Шприц для ввода
                25, // Химический стакан 50 мл
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

    private function filtrationExample(LaboratorySession $session): SessionComponent
    {
        $one = $session->sessionComponents()->where('place', SessionComponentPlace::inFiltrationExampleBoxOne)->first();
        $two = $session->sessionComponents()->where('place', SessionComponentPlace::inFiltrationExampleBoxTwo)->first();
        $three = $session->sessionComponents()->where('place', SessionComponentPlace::inFiltrationExampleBoxThree)->first();
        $four = $session->sessionComponents()->where('place', SessionComponentPlace::inFiltrationExampleBoxFour)->first();
        $mixedComponent = SessionComponent::filterExample($session, $one, $two, $three, $four);
        SessionComponent::clearFilterExampleComponents($one, $two, $three, $four);
        return $mixedComponent;
    }

    private function filtrationMobilePhase(LaboratorySession $session): SessionComponent
    {
        $sessionComponents = $session->sessionComponents()->where('place', SessionComponentPlace::inFiltrationMobilePhaseBox)->first();
        $mixedComponent = SessionComponent::filterMobilePhase($session, $sessionComponents);
        SessionComponent::clearFilterMobilePhaseComponent($sessionComponents);
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

    private function moveToPlaceComponent(
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
//        if(is_null($sessionComponent)) {
//            dd($place, $wheres);
//        }
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