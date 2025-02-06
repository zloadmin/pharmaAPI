<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\FiltrationExamplesCases;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\LaboratorySession;

trait HasFiltrationExampleSecondCase
{
    public function bicalutamideFiltrationExampleSecondMovedOnFilterExampleTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleSecondMovedOnFilterExample();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-examples'
        ]);
    }

    public function bicalutamideFiltrationExampleSecondFilteredExampleTestCase()
    {

        $laboratorySession = $this->bicalutamideFiltrationExampleSecondFilteredExample();
        return redirect()->route('cooking-stage', [
            'session'      => $laboratorySession->uuid,
            'preOpenModal' => 'filtration-examples'
        ]);
    }

    private function bicalutamideFiltrationExampleSecondFilteredExample(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleSecondMovedOnFilterExample();
        $mixedComponent = $this->filtrationExample($laboratorySession);
        $mixedComponent->moveToCart();
        return $laboratorySession;
    }

    private function bicalutamideFiltrationExampleSecondMovedOnFilterExample(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationExampleFirstFilteredExample();

        $this->bicalutamideFiltrationExampleSecondMovedOnFiltrationExamplesComponents($laboratorySession);
        return $laboratorySession;
    }

    private function bicalutamideFiltrationExampleSecondMovedOnFiltrationExamplesComponents(LaboratorySession $laboratorySession): void
    {
        // Мерная колба 10 мл - испыт р-р бикалутамида
        $this->moveToPlaceComponent($laboratorySession, SessionComponentPlace::inFiltrationExampleBoxOne, [
            'component_id' => 21,
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