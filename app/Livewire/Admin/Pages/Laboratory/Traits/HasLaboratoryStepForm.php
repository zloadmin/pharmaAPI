<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Models\Laboratory;
use App\Models\LaboratoryStep;

trait HasLaboratoryStepForm
{

    public $name = '';



    public function loadFormFields(LaboratoryStep $laboratoryStep): void
    {
        $this->name = $laboratoryStep->name;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:250'],
//            'description' => ['required'],
        ];
    }
}