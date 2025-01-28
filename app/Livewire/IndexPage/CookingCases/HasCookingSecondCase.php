<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Http\RedirectResponse;

trait HasCookingSecondCase
{


    /**
     * 1 приготовление Подвижной фазы Б - перенесено в смешивание
     *
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixSecondStageMovedOnMixTestCase()
    {
        $laboratorySession = $this->bicalutamideCookingMixSecondStageMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }


    /**
     * 2 приготовление Подвижной фазы Б - смешено, перенесено в инвентарь
     *
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixSecondStageDoneTestCase()
    {


        $laboratorySession = $this->bicalutamideCookingMixSecondStageDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    private function bicalutamideCookingMixSecondStageDone() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixSecondStageMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();
        return $laboratorySession;
    }

    private function bicalutamideCookingMixSecondStageMovedOnMix(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixFirstStageDone();

        $this->moveToMix($laboratorySession,
            [
                SessionComponentPlace::inMixBoxOne->value   => 42, // Ацетонитрил
                SessionComponentPlace::inMixBoxTwo->value   => 2, // Воронка средняя
                SessionComponentPlace::inMixBoxThree->value => 4, // Мерная колба
                SessionComponentPlace::inMixBoxFour->value  => 41 // стакан с трифторуксусной кислотой
            ]
        );
        return $laboratorySession;
    }

}