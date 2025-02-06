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
trait HasCookingSeventhCase
{

    public function bicalutamideCookingMixSeventhMovedOnMixTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixSeventhMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    public function bicalutamideCookingMixSeventhDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixSeventhDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);

    }
    private function bicalutamideCookingMixSeventhDone() : LaboratorySession
    {

        $laboratorySession = $this->bicalutamideCookingMixSeventhMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();
        return  $laboratorySession;
    }
    private function bicalutamideCookingMixSeventhMovedOnMix() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixSixthDone();
        $this->bicalutamideCookingMixSeventhMovedOnMixComponents($laboratorySession);
        return $laboratorySession;
    }
    private function bicalutamideCookingMixSeventhMovedOnMixComponents(LaboratorySession $laboratorySession): void
    {
        // Мерная колба 10 мл с СО бикалутамида (промеж)
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'is_mixed'                   => true,
            'place'                      => 'inCart',
            'mixed_one_component_id' => 26, // Бюкс
            'mixed_two_component_id' => 2, // Воронка средняя
            'mixed_three_component_id' => 22, // Мерная колба УФ
            'mixed_four_component_id' => 23, // Химический стакан
        ]);

        // Воронка средняя
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Мерная колба 20/25
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 21,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Result of mix number 3 - Растворитель в химическом стакане 200 мл
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
            'is_mixed'                   => true,
            'place'                      => 'inCart',
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 4, // Мерная колба 1л
            'mixed_two_component_id'     => 2, // Воронка средняя
            'mixed_three_component_id'   => 23, // Химический стакан
            'mixed_four_component_id'    => 4, // Мерная колба 1л
        ]);
    }
  
}