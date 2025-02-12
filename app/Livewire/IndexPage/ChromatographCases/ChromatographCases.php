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
        $laboratorySession = $this->bicalutamideChromatographReadyForSoftWareCase();


        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographFilledSoftWareCaseTestCase()
    {

        $laboratorySession = $this->bicalutamideChromatographFilledSoftWareCase();
        return redirect()->route('chromatograph-method-page', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographCheckedSoftWateCaseTestCase()
    {
        $laboratorySession = $this->bicalutamideChromatographFilledSoftWareCase();
        $laboratorySession->checkChromatographValues();

        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    private function bicalutamideChromatographFilledSoftWareCase(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideChromatographReadyForSoftWareCase();
        $laboratorySession->update([
            'chromatograph_column_temp' => $laboratorySession->laboratory->chromatograph_column_temp,
            'chromatograph_flow_speed'  => $laboratorySession->laboratory->chromatograph_flow_speed,
            'chromatograph_detector'    => $laboratorySession->laboratory->chromatograph_detector,
            'chromatograph_value'       => $laboratorySession->laboratory->chromatograph_value,
        ]);
        return $laboratorySession;
    }

    private function bicalutamideChromatographReadyForSoftWareCase(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase();
        // 1 - Установить ПФ
        $laboratorySession->setChromatographStatusInstalledJars();
        // 2 - Включить
        $laboratorySession->setChromatographStatusTurnOn();
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

        return $laboratorySession;
    }

}