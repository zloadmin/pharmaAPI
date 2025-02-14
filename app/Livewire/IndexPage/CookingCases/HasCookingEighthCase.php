<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Http\RedirectResponse;

/**
 * @method bicalutamideCookingMixSecondStageDone()
 */
trait HasCookingEighthCase
{

    /**
     * 1 приготовление химического стакана с готовой конечной подвижной фазой - перенесено в смешивание
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixEighthMovedOnMixTestCase()
    {

        $laboratorySession = $this->bicalutamideCookingMixEighthMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    /**
     * 2 приготовление химического стакана с готовой конечной подвижной фазой - смешено, перенесено в инвентарь
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixEighthDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixEighthDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    private function bicalutamideCookingMixEighthDone() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixEighthMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();
        return $laboratorySession;
    }

    private function bicalutamideCookingMixEighthMovedOnMix(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixSeventhDone();
        $this->bicalutamideCookingMixEighthStageMoveToMixComponent($laboratorySession);
        return $laboratorySession;

    }

    private function bicalutamideCookingMixEighthStageMoveToMixComponent(LaboratorySession $laboratorySession): void
    {
        // Подвижная фаза А
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
//            'mobile_phase_id' => 1,
                'type' => SessionComponentType::MobilePhase,
                'mixed_one_component_id' => 27, // Дестилированная вода
                'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
        ]);
        // Воронка средняя
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Химический стакан
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 23,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Подвижная фаза Б
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
//            'mobile_phase_id' => 2,
            'type'                       => SessionComponentType::MobilePhase,
            'mixed_one_component_id'     => 42, // Ацетонитрил
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
        ]);
    }

}