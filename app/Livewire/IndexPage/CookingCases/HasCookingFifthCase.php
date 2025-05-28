<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Http\RedirectResponse;

/**
 * @method bicalutamideCookingMixSecondStageDone()
 */
trait HasCookingFifthCase
{

    public function bicalutamideCookingMixFifthMovedOnMixTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixFifthMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    public function bicalutamideCookingMixFifthDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixFifthDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    private function bicalutamideCookingMixFifthDone() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixFifthMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();

        return $laboratorySession;
    }
    private function bicalutamideCookingMixFifthMovedOnMix() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixFourthDone();
        $this->bicalutamideCookingMixFifthMovedOnMixComponents($laboratorySession);
        return  $laboratorySession;
    }

    private function bicalutamideCookingMixFifthMovedOnMixComponents(LaboratorySession $laboratorySession): void
    {
        // Result of mix number 4 - мерная колба 50 мл с промежуточным испытуемым раствором бикалутамида
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'is_mixed'                   => true,
//            'place'                      => 'inCart',
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 26, // Бюкс
            'mixed_two_component_id'     => 2, // Воронка средняя
            'mixed_three_component_id'   => 19, // Мерная колба 0,5л
            'mixed_four_component_id'    => 23, // Химический стакан
        ]);

        // Воронка средняя
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Мерная колба 10/УФ
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 22,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Result of mix number 3 - Растворитель в химическом стакане 200 мл
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
            'is_mixed'                   => true,
//            'place'                      => 'inCart',
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 4, // Мерная колба 1л
            'mixed_two_component_id'     => 2, // Воронка средняя
            'mixed_three_component_id'   => 23, // Химический стакан
            'mixed_four_component_id'    => 4, // Мерная колба 1л
        ]);
    }
}
