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
        $laboratorySession = $this->bicalutamideCookingMixSecondStageDone();
        $this->bicalutamideCookingMixThirdStageMoveToMixComponent($laboratorySession);


        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    private function bicalutamideCookingMixThirdStageMoveToMixComponent(LaboratorySession $laboratorySession)
    {
        // Подвижная фаза А
        $this->moveToMixComponent($laboratorySession, SessionComponentPlace::inMixBoxOne, [
            'is_mixed'                   => true,
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 27, // Дестилированная вода
            //            'PH_id' => 1123, // TODO: after make PH
        ]);
        // Воронка средняя
        $this->moveToMixComponent($laboratorySession, SessionComponentPlace::inMixBoxTwo, [
            'component_id' => 2,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);
        // Мерная колба
        $this->moveToMixComponent($laboratorySession, SessionComponentPlace::inMixBoxThree, [
            'component_id' => 23,
            'is_mixed'     => false,
            'is_weighed'   => false
        ]);

        // Подвижная фаза Б
        $this->moveToMixComponent($laboratorySession, SessionComponentPlace::inMixBoxFour, [
            'is_mixed'                   => true,
            'mixed_weighed_component_id' => 41, // Трифторуксусная кислота
            'mixed_one_component_id'     => 42, // Ацетонитрил
            //            'PH_id' => 1123, // TODO: after make PH
        ]);
    }

//    /**
//     * 2 приготовление Подвижной фазы Б - смешено, перенесено в инвентарь
//     *
//     * @return RedirectResponse
//     */
//    public function bicalutamideCookingMixSecondStageDoneTestCase()
//    {
//
//
//        $laboratorySession = $this->bicalutamideCookingMixSecondStageMovedOnMix();
//        $mixedComponent = $this->mix($laboratorySession);
//        $mixedComponent->moveToCart();
//
//        return redirect()->route('cooking-stage', [
//            'session'      => $laboratorySession->uuid,
//            'preOpenModal' => 'mix'
//        ]);
//    }
//
//    private function bicalutamideCookingMixSecondStageMovedOnMix(): LaboratorySession
//    {
//        $laboratorySession = $this->bicalutamideCookingMixFirstStageDone();
//
//        $this->moveToMix($laboratorySession,
//            [
//                SessionComponentPlace::inMixBoxOne->value   => 42, // Ацетонитрил
//                SessionComponentPlace::inMixBoxTwo->value   => 2, // Воронка средняя
//                SessionComponentPlace::inMixBoxThree->value => 4, // Мерная колба
//                SessionComponentPlace::inMixBoxFour->value  => 41 // стакан с трифторуксусной кислотой
//            ]
//        );
//        return $laboratorySession;
//    }
//
//    private function bicalutamideCookingMixFirstStageMovedOnMix() : LaboratorySession
//    {
//        $laboratorySession = $this->bicalutamideFourthWeightDoneCalibrated();
//        $this->moveAllComponentsToCookingTable($laboratorySession);
//        $this->moveToMix($laboratorySession,
//            [
//                SessionComponentPlace::inMixBoxOne->value   => 27,
//                SessionComponentPlace::inMixBoxTwo->value   => 2,
//                SessionComponentPlace::inMixBoxThree->value => 4,
//                SessionComponentPlace::inMixBoxFour->value  => 41
//            ]
//        );
//        return $laboratorySession;
//    }


}