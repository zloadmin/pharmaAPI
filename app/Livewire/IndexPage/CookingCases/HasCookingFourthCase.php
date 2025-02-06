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
trait HasCookingFourthCase
{


    /**
     * 1 приготовление мерной колбы 50 мл с промежуточным испытуемым раствором бикалутамида - перенесено в смешивание
     *
     * @return void
     */
    public function bicalutamideCookingMixFourthMovedOnMixTestCase()
    {

        $laboratorySession = $this->bicalutamideCookingMixFourthMovedOnMix();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);

    }

    /**
     * 2 приготовление мерной колбы 50 мл с промежуточным испытуемым раствором бикалутамида - смешено, перенесено в инвентарь
     *
     * @return void
     */
    public function bicalutamideCookingMixFourthDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixFourthDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    private function bicalutamideCookingMixFourthDone(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixFourthMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();
        return $laboratorySession;
    }

    private function bicalutamideCookingMixFourthMovedOnMix(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixThirdStageDone();
        $this->bicalutamideCookingMixFourthMovedOnMixComponents($laboratorySession);
        return $laboratorySession;
    }

    private function bicalutamideCookingMixFourthMovedOnMixComponents(LaboratorySession $laboratorySession): void
    {
        // Бикалутамид, субстанция
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'weighed_right_component_id' => 37,
        ]);

        // Воронка средняя
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Мерная колба 0.50
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 19,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Result of mix number 3 - Растворитель в химическом стакане 200 мл
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
            'is_mixed'                 => true,
            'place'                    => 'inCart',
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'   => 4, // Мерная колба 1л
            'mixed_two_component_id'   => 2, // Воронка средняя
            'mixed_three_component_id' => 23, // Химический стакан
            'mixed_four_component_id'  => 4, // Мерная колба 1л
        ]);
    }
}