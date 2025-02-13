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
    public function bicalutamideChromatographInitTestCase()
    {
        $laboratorySession = $this->bicalutamideFiltrationMobilePhaseFirstFilteredMobilePhase();

        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographReadyForSoftWareTestCase()
    {
        $laboratorySession = $this->bicalutamideChromatographReadyForSoftWareCase();


        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographFilledSoftWareTestCase()
    {

        $laboratorySession = $this->bicalutamideChromatographFilledSoftWareCase();
        return redirect()->route('chromatograph-method-page', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideChromatographCheckedSoftWareTestCase()
    {

        $laboratorySession = $this->bicalutamideChromatographCheckedSoftWare();
        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    public function bicalutamideExamplesOnModalExamplesTestCase()
    {
        $laboratorySession = $this->bicalutamideExamplesOnModalExamples();

        return redirect()->route('chromatograph-stage', [
            'session'              => $laboratorySession->uuid,
            'preOpenModalExamples' => true
        ]);
    }

    public function bicalutamideExamplesDoneTestCase()
    {
        $laboratorySession = $this->bicalutamideExamplesOnModalExamples();
        $laboratorySession->setChromatographStatusIntroduceSampleDone();

        return redirect()->route('chromatograph-stage', [
            'session' => $laboratorySession->uuid
        ]);
    }

    private function bicalutamideExamplesOnModalExamples(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideChromatographCheckedSoftWare();
        $firstComponent = $laboratorySession->sessionComponents()->filteredExampleType()->skip(0)->take(1)->first();
        $firstComponent?->moveToChromatographExampleLeftBox();
        $secondComponent = $laboratorySession->sessionComponents()->filteredExampleType()->skip(1)->take(1)->first();
        $secondComponent?->moveToChromatographExampleRightBox();
        return $laboratorySession;
    }

    private function bicalutamideChromatographCheckedSoftWare(): LaboratorySession
    {
        $laboratorySession = $this->bicalutamideChromatographFilledSoftWareCase();
        $laboratorySession->checkChromatographValues();
        return $laboratorySession;
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