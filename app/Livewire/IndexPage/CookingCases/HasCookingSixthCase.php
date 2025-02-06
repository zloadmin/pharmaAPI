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
trait HasCookingSixthCase
{

    public function bicalutamideCookingMixSixthMovedOnMixTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixSixthMovedOnMix();


        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    public function bicalutamideCookingMixSixthDoneTestCase()
    {

        $laboratorySession = $this->bicalutamideCookingMixSixthDone();


        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    private function bicalutamideCookingMixSixthDone() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixSixthMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();

        return $laboratorySession;

    }

    private function bicalutamideCookingMixSixthMovedOnMix(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixFifthDone();
        $this->bicalutamideCookingMixSixthMovedOnMixComponents($laboratorySession);
        return $laboratorySession;
    }

    private function bicalutamideCookingMixSixthMovedOnMixComponents(LaboratorySession $laboratorySession): void
    {
        // Бюкс с Бикалутамидом СО 20 мг
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'weighed_right_component_id' => 38, // Бикалутамид СО
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
            'place'                      => 'inCart',
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 4, // Мерная колба 1л
            'mixed_two_component_id'     => 2, // Воронка средняя
            'mixed_three_component_id'   => 23, // Химический стакан
            'mixed_four_component_id'    => 4, // Мерная колба 1л
        ]);
    }


}