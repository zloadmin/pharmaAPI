<?php
declare(strict_types=1);


namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;


use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Livewire\Admin\Traits\HasRedirects;
use Illuminate\Support\Facades\Log;

trait ChromatographForm
{

    public $isBinaryPump;
    public $binaryPumpValue;
    public $isColPath;
    public $colPathValue;

    public function mountChromatographForm()
    {
        $this->loadFormValues();
    }

    public function loadFormValues(): void
    {
        $this->isBinaryPump = $this->sessionModel->getChromatographValue('isBinaryPump');
        $this->binaryPumpValue = $this->sessionModel->getChromatographValue('binaryPumpValue');
        $this->isColPath = $this->sessionModel->getChromatographValue('isColPath');
        $this->colPathValue = $this->sessionModel->getChromatographValue('colPathValue');
    }

    public function save(): void
    {
        $this->sessionModel->saveChromatographValues([
            'isBinaryPump'    => $this->isBinaryPump,
            'binaryPumpValue' => $this->binaryPumpValue,
            'isColPath'       => $this->isColPath,
            'colPathValue'    => $this->colPathValue,
        ]);

//        Log::info('ChromatographForm::save', [
//            'isBinaryPump'    => $this->isBinaryPump,
//            'binaryPumpValue' => $this->binaryPumpValue,
//            'isColPath'       => $this->isColPath,
//            'colPathValue'    => $this->colPathValue,
//        ]);
    }

    public function saveAndRedirect($name, $parameters = []): void
    {
        $this->save();
        $this->sessionModel->update([
            'chromatograph_status_introduce_sample' => ChromatographStatusIntroduceSample::Introduce
        ]);
        $this->redirectRoute($name, $parameters, true, true);
    }

}