<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use App\Models\PharmacologicalArticle;
use Illuminate\Support\Facades\Route;

trait HasSession
{


    public string $session;
    public LaboratorySession $sessionModel;
    public Laboratory $laboratory;
    public ?PharmacologicalArticle $pharmacologicalArticle;

    public function setSession(string $session): void
    {
        $this->session = $session;
        $this->sessionModel = $this->getSession();
        $this->laboratory = $this->sessionModel->laboratory;
        $this->laboratory->load('tasks');
        $this->pharmacologicalArticle = $this->sessionModel->laboratory->pharmacologicalArticle;
    }

    public function getSessionScalesWeightCalibration(): float
    {
        return $this->sessionModel->scales_weight_calibration;
    }

    public function setSessionScalesWeightCalibration(float $value): void
    {

        $this->sessionModel->update([
            'scales_weight_calibration' =>
                $this->sessionModel->scales_weight_calibration ? $this->sessionModel->scales_weight_calibration + $value : $value
        ]);
    }

//    public function setSessionChromatographIsSet(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_is_set' => $is_set]);
//    }
//
//    public function setSessionChromatographIsTurnOn(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_is_turn_on' => $is_set]);
//    }
//
//    public function setSessionChromatographIsOpenOn(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_is_open' => $is_set]);
//    }
//
//    public function setSessionChromatographReplacedOn(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_replaced' => $is_set]);
//    }
//
//    public function setSessionChromatographPumpOn(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_pump' => $is_set]);
//    }
//
//    public function setSessionChromatographInjectorOn(bool $is_set): void
//    {
//        $this->sessionModel->update(['chromatograph_injector' => $is_set]);
//    }


    public function getSession(): LaboratorySession
    {
        return LaboratorySession::where('uuid', $this->session)
            ->with(['laboratory', 'laboratory.pharmacologicalArticle'])
            ->firstOrFail();
    }

    public function getSessionSettings(): array
    {
        return $this->sessionModel->settings ?? [];
    }

    public function setSessionSetting(string $key, $value): void
    {
        $settings = $this->getSessionSettings();
        $settings[$key] = $value;
        $this->sessionModel->update([
            'settings' => $settings
        ]);
    }

    public function getSessionSetting(string $key): mixed
    {
        return $this->sessionModel->settings[$key] ?? null;
    }

//    public function getSession()
//    {
//        return $this->session;
//    }

}