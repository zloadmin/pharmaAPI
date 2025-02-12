<?php
declare(strict_types=1);


namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;


use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Livewire\Admin\Traits\HasRedirects;
use Illuminate\Support\Facades\Log;

trait ChromatographForm
{

    public ?float $chromatograph_column_temp = null;
    public ?float $chromatograph_flow_speed = null;
    public ?int $chromatograph_detector = null;
    public ?int $chromatograph_value = null;

    public function mountChromatographForm()
    {
        $this->loadFormValues();
    }

    public function loadFormValues(): void
    {
        $this->chromatograph_column_temp = $this->sessionModel->chromatograph_column_temp;
        $this->chromatograph_flow_speed = $this->sessionModel->chromatograph_flow_speed;
        $this->chromatograph_detector = $this->sessionModel->chromatograph_detector;
        $this->chromatograph_value = $this->sessionModel->chromatograph_value;
    }

    public function save(): void
    {
        $this->sessionModel->update([
            'chromatograph_column_temp' => $this->chromatograph_column_temp,
            'chromatograph_flow_speed'  => $this->chromatograph_flow_speed,
            'chromatograph_detector'    => $this->chromatograph_detector,
            'chromatograph_value'       => $this->chromatograph_value,
        ]);


    }

    public function saveAndCheck()
    {
        $this->save();
        $this->sessionModel->refresh();

        if ($this->sessionModel->isChromatographValuesRight()) {
            $this->sessionModel->setChromatographStatusIntroduceSampleIntroduce();
            $this->redirectRoute('chromatograph-stage', $this->session);

        } else {
            $this->js("alert('Неверные данные')");
        }
    }

    public function saveAndRedirect($name, $parameters = []): void
    {
        $this->save();
        $this->redirectRoute($name, $parameters, true, true);
    }

}