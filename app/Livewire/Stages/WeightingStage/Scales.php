<?php

namespace App\Livewire\Stages\WeightingStage;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasTableChooseMode;
use App\Livewire\Traits\HasSession;
use App\Models\SessionComponent;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Scales extends Component
{
    use HasSession;
    use HasTableChooseMode;

    public ?SessionComponent $leftBoxComponent = null;
    public ?SessionComponent $rightBoxComponent = null;
    public ?SessionComponent $bottomBoxComponent = null;

    public bool $isShowRange = false;

    public float $scalesRangeValue = 0.0;
    public float $scalesWeightCalibration = 0.0;
    public float $scalesWeightOfComponents = 0.0;
    public float $scalesWeight = 0;

    public function mount(string $session)
    {
        $this->init($session);
    }

    public function init(string $session)
    {
        $this->setSession($session);
        $this->setLeftBoxComponent();
        $this->setRightBoxComponent();
        $this->setBottomBoxComponent();
        // scales value
        $this->setScalesWeightCalibration();
        $this->setScalesWeightOfComponents();
        $this->setScalesRangeValue();
        $this->setScalesWeight();


        $this->setIsShowRange();
        $this->disableTableChooseMode();
        $this->dispatch('scales-init');
    }

    public function weigh()
    {
        if ($this->isShowRange && $this->getScalesWeight() > 0) {
            // 1 save session component as weighed
            $this->leftBoxComponent->update([
                'is_weighed'                  => true,
                'weighed_value'               => $this->getScalesWeight(),
                'weighed_left_component_id'   => $this->leftBoxComponent->id,
                'weighed_right_component_id'  => $this->rightBoxComponent->id,
                'weighed_bottom_component_id' => $this->bottomBoxComponent->id,
            ]);
        }
        $this->cleanScales();
    }

    public function cleanScales(): void
    {
        // 2 move all to table
        $this->leftBoxComponent?->moveToWeightingTable();
        $this->rightBoxComponent?->moveToWeightingTable();
        $this->bottomBoxComponent?->moveToWeightingTable();
        // 3 dispatch events
        $this->dispatch('session-component-moved-to-weighting-table');
    }

    public function render()
    {
        return view('livewire.stages.weighting-stage.scales');
    }

    #[On('session-component-moved-to-scales')]
    #[On('session-component-moved-to-weighting-table')]
    public function updateScales(): void
    {
        $this->init($this->session);
    }


    public function submit()
    {

    }

    private function setLeftBoxComponent(): void
    {
        $this->leftBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesLeftBox);
    }

    private function setRightBoxComponent(): void
    {
        $this->rightBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesRightBox);
    }

    private function setBottomBoxComponent(): void
    {
        $this->bottomBoxComponent = $this->getSessionComponentByPlace(SessionComponentPlace::onScalesBottomBox);
    }

    private function getWeightOfComponents(): float
    {
        $weight = 0;
        if ($this->leftBoxComponent) {
            $weight += $this->leftBoxComponent->component->weight;
        }
        if ($this->rightBoxComponent) {
            $weight += $this->rightBoxComponent->component->weight;
        }
        if ($this->bottomBoxComponent) {
            $weight += $this->bottomBoxComponent->component->weight;
        }

        return $weight;
    }

    private function setScalesWeight(): void
    {
        $this->scalesWeight = $this->scalesWeightOfComponents - $this->scalesWeightCalibration + $this->scalesRangeValue;
    }
    private function getScalesWeight(): float
    {
        return $this->scalesWeightOfComponents + $this->scalesRangeValue - $this->scalesWeightCalibration;
    }

    public function moveToTable(SessionComponentPlace $place)
    {

        $sessionComponent = $this->getSessionComponentByPlace($place);
        if ($sessionComponent) {
            $sessionComponent->moveToWeightingTable();
            $this->dispatch('session-component-moved-to-weighting-table');
        }
    }

    public function calibration(): void
    {

        $this->setSessionScalesWeightCalibration($this->getScalesWeight());
        $this->init($this->session);
    }

    public function getSessionComponentByPlace(SessionComponentPlace $place): ?SessionComponent
    {
        return SessionComponent::bySession($this->session)
            ->byPlace($place)
            ->first();
    }


    public function isAllBoxHasComponent()
    {
        return $this->leftBoxComponent && $this->rightBoxComponent && $this->bottomBoxComponent;
    }

    public function isAllBoxComponentsHasSameType()
    {
        return $this->leftBoxComponent->component->type == $this->rightBoxComponent->component->type
            && $this->rightBoxComponent->component->type == $this->bottomBoxComponent->component->type;
    }

    private function setIsShowRange(): void
    {
//        dd($this->leftBoxComponent->component->type, $this->rightBoxComponent->component->type, $this->bottomBoxComponent->component->type);

        $this->isShowRange = $this->isAllBoxHasComponent() && $this->isAllBoxComponentsHasSameType();

    }

    private function setScalesRangeValue(): void
    {
        $this->scalesRangeValue = $this->leftBoxComponent && $this->leftBoxComponent->isHasWeighedValue() ? $this->leftBoxComponent->weighed_value : 0;
    }

    private function setScalesWeightCalibration(): void
    {
        $this->scalesWeightCalibration = $this->sessionModel->scales_weight_calibration;
    }

    private function setScalesWeightOfComponents(): void
    {
        $this->scalesWeightOfComponents = $this->getWeightOfComponents();
    }


}
