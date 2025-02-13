<?php

namespace App\Livewire\Stages\ChromatographStage;

use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
use App\Enums\SessionComponent\SessionComponentType;
use App\Livewire\Stages\ChromatographStage\ChromatographStage\HasChromatographStatuses;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ChromatographStage extends Component
{
    use HasSession;
    use HasChromatographStatuses;

    #[Url]
    public bool $preOpenModalExamples = false;

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setChromatographStatusInstalledJars();
        $this->setChromatographStatusTurnOn();
        $this->setChromatographStatusFlushValve();
        $this->setChromatographStatusPump();
        $this->setChromatographStatusColumns();
        $this->setChromatographStatusSoftWare();
        $this->setChromatographStatusIntroduceSample();
        $this->setChromatographStatusEntries();
    }

    #[On('modal-chromatograph-examples-updated')]
    public function updatePage()
    {
        $this->init($this->session);
    }

    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.chromatograph-stage');
    }


    /**
     * Установка банок хромотографа
     *
     * @return void
     */
    public function turnOnStatusInstalledJars(): void
    {
        $this->sessionModel->setChromatographStatusInstalledJars();
        $this->init($this->session);
        $this->dispatch('storage-component-deleted-in-cart');
    }

    /**
     * Включение хромотографа
     *
     * @return void
     */
    public function turnOnChromatograph(): void
    {
        $this->sessionModel->setChromatographStatusTurnOn();
        $this->init($this->session);
    }

    /**
     * Открытие вентиля промывки капилляров
     *
     * @return void
     */
    public function openChromatographFlushValve(): void
    {
        $this->sessionModel->setChromatographStatusFlushValveOpen();
        $this->init($this->session);
    }

    /**
     * Закрытие вентиля промывки капилляров
     *
     * @return void
     */
    public function closeChromatographFlushValve(): void
    {
        $this->sessionModel->setChromatographStatusFlushValveClose();
        $this->init($this->session);
    }

    /**
     * Включить насос
     *
     * @return void
     */
    public function turnOnPump(): void
    {
        $this->sessionModel->setChromatographPumpReadyOff();
        $this->init($this->session);
    }

    /**
     * Выключить насос
     *
     * @return void
     */
    public function turnOffPump(): void
    {
        $this->sessionModel->setChromatographPumpOff();
        $this->init($this->session);
    }

    /**
     * Заменить колонки
     *
     * @return void
     */
    public function replaceColumns(): void
    {
        $this->sessionModel->setColumnsReplaced();
        $this->init($this->session);
    }

    /**
     * Запуск ПО
     *
     * @return void
     */
    public function runSoftWare(): void
    {
        $this->redirectRoute('chromatograph-method-page', [$this->session], true, true);
    }


}
