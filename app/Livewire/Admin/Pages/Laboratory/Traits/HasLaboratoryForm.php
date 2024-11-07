<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Models\Laboratory;

trait HasLaboratoryForm
{
    public string $currentTab = 'index';
    public array $tabs = [
        'index'    => 'Описание',
        'storage'  => 'Склад',
        'weighing' => 'Весовая'
    ];
    public $name = '';
    public $description = '';
    public array $storage_component_ids = [];

    public function showTab($tabKey): void
    {
        $this->currentTab = $tabKey;
    }

    public function loadFormFields(Laboratory $laboratory): void
    {
        $this->name = $laboratory->name;
        $this->description = $laboratory->description;
        $this->storage_component_ids = $laboratory->storageComponents()->pluck('id')->toArray();
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:250'],
            'description' => ['required'],
        ];
    }
}