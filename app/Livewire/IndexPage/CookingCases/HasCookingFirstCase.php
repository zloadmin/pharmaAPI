<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\CookingCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Http\RedirectResponse;

trait HasCookingFirstCase
{

    /**
     * 1 приготовление Подвижной фазы А - перенесено в смешивание
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixFirstStageMovedOnMixTestCase()
    {

        $laboratorySession = $this->bicalutamideCookingMixFirstStageMovedOnMix();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

    /**
     * 2 приготовление Подвижной фазы А - смешено
     * @return RedirectResponse
     */
    public function bicalutamideCookingMixFirstStageDoneTestCase()
    {


        $laboratorySession = $this->bicalutamideCookingMixFirstStageDone();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }
    private function bicalutamideCookingMixFirstStageDone()
    {
        $laboratorySession = $this->bicalutamideCookingMixFirstStageMovedOnMix();
        $mixedComponent = $this->mix($laboratorySession);
        $mixedComponent->moveToCart();
        return $laboratorySession;
    }

    private function bicalutamideCookingMixFirstStageMovedOnMix() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFourthWeightDoneCalibrated();
        $this->moveAllComponentsToCookingTable($laboratorySession);
        $this->moveToMix($laboratorySession,
            [
                SessionComponentPlace::inMixBoxOne->value   => 27,
                SessionComponentPlace::inMixBoxTwo->value   => 2,
                SessionComponentPlace::inMixBoxThree->value => 4,
                SessionComponentPlace::inMixBoxFour->value  => 41
            ]
        );
        return $laboratorySession;
    }

}