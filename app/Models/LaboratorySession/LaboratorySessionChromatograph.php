<?php
declare(strict_types=1);


namespace App\Models\LaboratorySession;


use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusEntries;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method update(array $array)
 */
trait LaboratorySessionChromatograph
{
    public function setChromatographStatusTurnOn(): void
    {
        $this->update([
            'chromatograph_status_turn_on'     => ChromatographStatusTurnOn::On,
            'chromatograph_status_flush_valve' => ChromatographStatusFlushValve::ReadyForOpen
        ]);
    }

    public function setChromatographStatusFlushValveOpen(): void
    {
        $this->update([
            'chromatograph_status_flush_valve' => ChromatographStatusFlushValve::Open,
            'chromatograph_status_pump'        => ChromatographStatusPump::ReadyOn,
        ]);
    }

    public function setChromatographStatusFlushValveClose(): void
    {
        $this->update([
            'chromatograph_status_flush_valve' => ChromatographStatusFlushValve::ReadyForOpen,
            'chromatograph_status_columns'     => ChromatographStatusColumns::NoReplaced,
        ]);
    }

    public function setChromatographPumpReadyOff(): void
    {
        $this->update([
            'chromatograph_status_pump' => ChromatographStatusPump::ReadyOff,
        ]);
    }

    public function setChromatographPumpOff(): void
    {
        $newStatusFlushValue = $this->chromatograph_status_flush_valve->isReadyForOpen() ? ChromatographStatusFlushValve::ReadyForOpen : ChromatographStatusFlushValve::ReadyForClose;
        $newStatusSoftWare = $this->chromatograph_status_columns->isReplaced() ? ChromatographStatusSoftWare::Enable : ChromatographStatusSoftWare::Disabled;
        // if column replaced  -  enable run Soft
        $this->update([
            'chromatograph_status_pump'        => ChromatographStatusPump::ReadyOn,
            'chromatograph_status_flush_valve' => $newStatusFlushValue,
            'chromatograph_status_soft_ware'   => $newStatusSoftWare,
        ]);
    }

    public function setColumnsReplaced(): void
    {
        $this->update([
            'chromatograph_status_columns' => ChromatographStatusColumns::Replaced,
            'chromatograph_status_pump'    => ChromatographStatusPump::ReadyOn,
        ]);
    }

    public function setChromatographStatusInstalledJars(): void
    {
        $this->update([
            'chromatograph_status_installed_jars' => $this->getNewStatusOfChromatographStatusInstalledJars(),
            'chromatograph_status_turn_on'        => ChromatographStatusTurnOn::Off
        ]);
        $this->getMobilePhasesSessionComponentsBuilder()->delete();
    }

    public function setChromatographStatusIntroduceSampleIntroduce(): void
    {
        $this->update([
            'chromatograph_status_introduce_sample' => ChromatographStatusIntroduceSample::Introduce
        ]);
    }

    public function setChromatographStatusIntroduceSampleDone(): void
    {
        $this->update([
            'chromatograph_status_introduce_sample' => ChromatographStatusIntroduceSample::Done,
            'chromatograph_status_entries'          => ChromatographStatusEntries::Enable
        ]);
    }

    private function getNewStatusOfChromatographStatusInstalledJars(): ChromatographStatusInstalledJars
    {
        return $this->getMobilePhasesSessionComponentsBuilder()->count() > 1 ? ChromatographStatusInstalledJars::InstalledTwo : ChromatographStatusInstalledJars::InstalledOne;
    }

    private function getMobilePhasesSessionComponentsBuilder(): Builder
    {
        return SessionComponent::bySession($this->uuid)->where('type', SessionComponentType::FilteredMobilePhase);
    }

    public function isInstalledTwoJarsBackground(): bool
    {
        return
            $this->chromatograph_status_installed_jars == ChromatographStatusInstalledJars::InstalledTwo
            &&
            $this->chromatograph_status_pump == ChromatographStatusPump::Disabled;
    }
    public function isInstalledOneJarsBackground(): bool
    {
        return
            $this->chromatograph_status_installed_jars == ChromatographStatusInstalledJars::InstalledOne
            &&
            $this->chromatograph_status_pump == ChromatographStatusPump::Disabled;
    }

    public function isFlushValueOpenBackground()
    {
        return $this->chromatograph_status_flush_valve == ChromatographStatusFlushValve::Open;
    }
}