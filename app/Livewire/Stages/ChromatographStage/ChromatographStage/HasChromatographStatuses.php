<?php
declare(strict_types=1);


namespace App\Livewire\Stages\ChromatographStage\ChromatographStage;


use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;

trait HasChromatographStatuses
{
    public ChromatographStatusInstalledJars $chromatographStatusInstalledJars;
    public ChromatographStatusTurnOn $chromatographStatusTurnOn;
    public ChromatographStatusFlushValve $chromatographStatusFlushValve;
    public ChromatographStatusPump $chromatographStatusPump;
    public ChromatographStatusColumns $chromatographStatusColumns;
    public ChromatographStatusSoftWare $chromatographStatusSoftWare;
    public ChromatographStatusIntroduceSample $chromatographStatusIntroduceSample;

    private function setChromatographStatusInstalledJars(): void
    {
        $this->chromatographStatusInstalledJars = $this->sessionModel->chromatograph_status_installed_jars;
    }

    private function setChromatographStatusTurnOn(): void
    {
        $this->chromatographStatusTurnOn = $this->sessionModel->chromatograph_status_turn_on;
    }

    private function setChromatographStatusFlushValve(): void
    {
        $this->chromatographStatusFlushValve = $this->sessionModel->chromatograph_status_flush_valve;
    }

    private function setChromatographStatusPump(): void
    {
        $this->chromatographStatusPump = $this->sessionModel->chromatograph_status_pump;
    }

    private function setChromatographStatusColumns(): void
    {
        $this->chromatographStatusColumns = $this->sessionModel->chromatograph_status_columns;
    }

    private function setChromatographStatusSoftWare(): void
    {
        $this->chromatographStatusSoftWare = $this->sessionModel->chromatograph_status_soft_ware;
    }

    private function setChromatographStatusIntroduceSample(): void
    {
        $this->chromatographStatusIntroduceSample = $this->sessionModel->chromatograph_status_introduce_sample;
    }

}