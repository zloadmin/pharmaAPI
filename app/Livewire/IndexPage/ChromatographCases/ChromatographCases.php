<?php
declare(strict_types=1);


namespace App\Livewire\IndexPage\ChromatographCases;


use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
use App\Models\LaboratorySession;

trait ChromatographCases
{
    public function bicalutamideChromatographInitCaseTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase();

        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographReadyForSoftWareCaseTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase();
        // 1 - Включить
        $laboratorySession->setChromatographStatusTurnOn();
        // 2 - Установить ПФ
        $laboratorySession->setChromatographStatusInstalledJars();
        // 3 - Открыть вентиль промывки капилляров
        $laboratorySession->setChromatographStatusFlushValveOpen();
        // 4 - Включить насос
        $laboratorySession->setChromatographPumpReadyOff();
        // 5 - Выключить насос
        $laboratorySession->setChromatographPumpOff();
        // 6 - Закрыть вентиль промывки капилляров
        $laboratorySession->setChromatographStatusFlushValveClose();
        // 7 - установить колонку
        $laboratorySession->setColumnsReplaced();
        // 8 - Включить насос
        $laboratorySession->setChromatographPumpReadyOff();
        // 9 - Выключить насос
        $laboratorySession->setChromatographPumpOff();


        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

}