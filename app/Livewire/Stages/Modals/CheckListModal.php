<?php

namespace App\Livewire\Stages\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\Laboratory;
use App\Models\LaboratoryCheckValue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class CheckListModal extends Component
{
    use HasSession;

    public $isShow = false;
    public array $check_values = [];
    public array $check_value_statuses = [];
    public Collection $checkValuesCollection;

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
        $this->setCheckValuesCollection();
        $this->setCheckValues();
        $this->setCheckValueStatuses();
    }

    #[On('show-modal-check-list')]
    public function showModal(): void
    {
        $this->isShow = true;
    }

    #[On('hide-modal-check-list')]
    public function hideModal(): void
    {
        $this->isShow = false;
    }

    public function check(): void
    {
        $this->validate();
        $this->updateCheckValues();
        $this->init($this->session);
    }


    public function updateCheckValues(): void
    {

        $this->sessionModel->update([
            'check_values' => $this->check_values
        ]);
    }

    public function render()
    {
        return view('livewire.stages.modals.check-list-modal');
    }

    private function setCheckValues(): void
    {

        foreach ($this->checkValuesCollection as $checkValue) {
            $this->check_values[$checkValue->id] = $this->sessionModel->check_values[$checkValue->id] ?? null;
        }
    }

    private function setCheckValueStatuses(): void
    {
        foreach ($this->checkValuesCollection as $checkValue) {
            $this->check_value_statuses[$checkValue->id] = $this->getCheckValueStatus($checkValue);
        }

    }

    public function getCheckValueStatus(LaboratoryCheckValue $checkValue): string
    {

        if (isset($this->sessionModel->check_values[$checkValue->id]) && $this->sessionModel->check_values[$checkValue->id]) {
            $value = floatval($this->sessionModel->check_values[$checkValue->id]);
            return $value >= $checkValue->value_min && $value <= $checkValue->value_max ? 'green' : 'red';
        }
        return 'grey';
    }


    public function rules(): array
    {

        $rules = [];
        foreach ($this->checkValuesCollection as $checkValue) {
            $rules['check_values.' . $checkValue->id] = ['nullable', 'numeric', 'min:0.0001', 'max:999.9999'];
        }
        return $rules;
    }

    private function setCheckValuesCollection(): void
    {
        $this->checkValuesCollection = $this->laboratory->checkValues()->get();
    }
}
