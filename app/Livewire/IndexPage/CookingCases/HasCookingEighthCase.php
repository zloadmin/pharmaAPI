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
trait HasCookingEighthCase
{

    public function bicalutamideCookingMixEighthMovedOnMixTestCase()
    {

        $laboratorySession = $this->bicalutamideCookingMixEighthMovedOnMix();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'mix'
        ]);
    }

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
            'mobile_phase_id' => 1,
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
            'mobile_phase_id' => 2,
        ]);
    }

}