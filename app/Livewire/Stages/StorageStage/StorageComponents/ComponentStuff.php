<?php

namespace App\Livewire\Stages\StorageStage\StorageComponents;

use App\Livewire\Traits\HasSession;
use App\Models\CartStorageComponent;
use Livewire\Attributes\Validate;

class ComponentStuff extends MainComponent
{
    use HasSession;


    #[Validate('required|integer|min:1|max:99')]
    public $value = 1;

    public function render()
    {
        return view('livewire.stages.storage-stage.storage-components.component-stuff');
    }

    public function addValue(): void
    {
        $this->value = intval($this->value);
        $this->value++;
    }

    public function removeValue(): void
    {
        $this->value = intval($this->value);
        $this->value = $this->value - 1 <= 0 ? 1 : $this->value - 1;
    }


    public function resetValue(): void
    {
        $this->value = 1;
    }

}
