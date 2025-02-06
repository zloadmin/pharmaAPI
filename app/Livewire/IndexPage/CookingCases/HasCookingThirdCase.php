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
trait HasCookingThirdCase
{

    /**
     * 1 приготовление Химический стакан 200 мл с растворителем - перенесено в смешивание
     *
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixThirdStageMovedOnMixTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixThirdStageMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    /**
     * 2 приготовление Химический стакан 200 мл с растворителем - смешено, перенесено в инвентарь
     * @return void
     */
    public function bicalutamideCookingMixThirdStageDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixThirdStageDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);

    }

    private function bicalutamideCookingMixThirdStageDone() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixThirdStageMovedOnMix();
        for ($i = 0; $i < 4; $i++) {
            $this->bicalutamideCookingMixThirdStageMoveToMixComponent($laboratorySession);
            $mixedComponent = $this->mix($laboratorySession);
            $mixedComponent->moveToCart();
        }
        return  $laboratorySession;
    }
    private function bicalutamideCookingMixThirdStageMovedOnMix() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixSecondStageDone();
        $this->bicalutamideCookingMixThirdStageMoveToMixComponent($laboratorySession);
        return $laboratorySession;
    }
    private function bicalutamideCookingMixThirdStageMoveToMixComponent(LaboratorySession $laboratorySession): void
    {
        // Подвижная фаза А
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'mobile_phase_id' => 1,
        ]);
        // Воронка средняя
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Мерная колба
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 23,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Подвижная фаза Б
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
            'mobile_phase_id' => 2,
        ]);
    }

}