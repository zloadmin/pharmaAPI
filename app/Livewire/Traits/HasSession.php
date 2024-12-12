<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Models\LaboratorySession;
use Illuminate\Support\Facades\Route;

trait HasSession
{


    public string $session;
    public LaboratorySession $sessionModel;

    public function setSession(string $session): void
    {
        $this->session = $session;
        $this->sessionModel = $this->getSession();
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

    public function getSession(): LaboratorySession
    {
        return LaboratorySession::where('uuid', $this->session)->firstOrFail();
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