<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\FiltrationExamplesCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\LaboratorySession;

trait HasFiltrationExampleFirstCase
{
    public function bicalutamideFiltrationExampleFirstMovedOnFilterExampleTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleFirstMovedOnFilterExample();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-examples'
        ]);
    }
    public function bicalutamideFiltrationExampleFirstFilteredExampleTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleFirstFilteredExample();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-examples'
        ]);
    }
    private function bicalutamideFiltrationExampleFirstFilteredExample() : LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleFirstMovedOnFilterExample();
        $mixedComponent = $this->filtrationExample($laboratorySession);
        $mixedComponent->moveToCart();
        return  $laboratorySession;
    }

    private function bicalutamideFiltrationExampleFirstMovedOnFilterExample(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideCookingMixAllCleanAndMixedMovedToCart();

        $laboratorySession->sessionComponents()->where('place', SessionComponentPlace::inCart)->update([
            'place' => SessionComponentPlace::onCookingTable
        ]);
        $this->bicalutamideFiltrationExampleFirstMovedOnFiltrationExamplesComponents($laboratorySession);
        return $laboratorySession;
    }

    private function bicalutamideFiltrationExampleFirstMovedOnFiltrationExamplesComponents(LaboratorySession $laboratorySession): void
    {
        // Мерная колба 20 мл с СО бикалутамида
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationExampleBoxOne, [
            'component_id' => 22,
            'type'         => SessionComponentType::Mixed,
        ]);

        // Шприц для фильтрации
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationExampleBoxTwo, [
            'component_id' => 30,
            'type'         => SessionComponentType::Simple,
        ]);
        // Шприц для ввода
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationExampleBoxThree, [
            'component_id' => 29,
            'type'         => SessionComponentType::Simple,
        ]);

        // Химический стакан 50 мл
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationExampleBoxFour, [
            'component_id' => 25,
            'type'         => SessionComponentType::Simple,
        ]);
    }
}