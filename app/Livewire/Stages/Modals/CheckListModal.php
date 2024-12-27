<?php

namespace App\Livewire\Stages\Modals;

use App\Livewire\Traits\HasSession;
use App\Models\Laboratory;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class CheckListModal extends Component
{
    use HasSession;

    public $isShow = false;
    public array $check_values = [];
    public array $check_value_statuses = [];

    public function mount($session)
    {
        $this->init($session);
    }

    public function init($session): void
    {
        $this->setSession($session);
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

        foreach (Laboratory::$checkValues as $checkValue) {
            $this->check_values[$checkValue['name']] = $this->sessionModel->check_values[$checkValue['name']] ?? null;
        }
    }

    private function setCheckValueStatuses(): void
    {
        foreach (Laboratory::$checkValues as $checkValue) {
            $this->check_value_statuses[$checkValue['name']] = $this->getCheckValueStatus($checkValue['name']);
        }

    }

    public function getCheckValueStatus(string $valueName): string
    {

        if (isset($this->sessionModel->check_values[$valueName]) && $this->sessionModel->check_values[$valueName]) {
            $floatVal = floatval($this->sessionModel->check_values[$valueName]);
            $floatFrom = floatval($this->laboratory->check_values[$valueName . '_from'] ?? 0);
            $floatTo = floatval($this->laboratory->check_values[$valueName . '_to'] ?? 0);
            return $floatVal >= $floatFrom && $floatVal <= $floatTo ? 'green' : 'red';
        }
        return 'grey';
    }


    public function rules(): array
    {

        $rules = [];
        foreach (Laboratory::$checkValues as $checkValue) {
            $rules['check_values.' . $checkValue['name']] = ['nullable', 'numeric', 'min:0.0001', 'max:999.9999'];
        }
        return $rules;
    }
}
