<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\FiltrationMobilePhase;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\LaboratorySession;

trait HasFiltrationMobilePhaseFirstCase
{
    public function bicalutamideFiltrationMobilePhaseFirstMovedOnFilterMobilePhaseTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstMovedOnFilterMobilePhase();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-mobile-phase'
        ]);
    }

    public function bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhaseTestCase()
    {

        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase();

        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-mobile-phase'
        ]);
    }

    private function bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstMovedOnFilterMobilePhase();
        $sessionComponent = $this->filtrationMobilePhase($laboratorySession);
        $sessionComponent->moveToCart();
        $laboratorySession->checkChromatographRoomLock();
        return $laboratorySession;
    }

    private function bicalutamideFiltrationMobilePhaseFirstMovedOnFilterMobilePhase(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleSecondFilteredExample();
        $this->bicalutamideFiltrationMobilePhaseFirstMoveOnFilterMobilePhase($laboratorySession);
        return $laboratorySession;
    }

    private function bicalutamideFiltrationMobilePhaseFirstMoveOnFilterMobilePhase(LaboratorySession $laboratorySession): void
    {
        // Химический стакан 200 мл с готовой подвижной фазой
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationMobilePhaseBox, [
            'component_id' => 23,
            'type'         => SessionComponentType::Mixed,
        ]);

    }

}