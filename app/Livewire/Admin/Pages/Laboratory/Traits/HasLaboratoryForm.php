<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Models\Laboratory;
use Illuminate\Validation\Rule;

trait HasLaboratoryForm
{
    public string $currentTab = 'index';
    public array $tabs = [
        'index'                   => 'Описание',
        'storage'                 => 'Склад',
        'pharmacological-article' => 'ФС'
        //        'weighing' => 'Весовая'
    ];
    public $name = '';
    public $description = '';
    public array $component_ids = [];
    public ?int $pharmacological_article_id = null;


    public function showTab($tabKey): void
    {
        $this->currentTab = $tabKey;
    }

    public function loadFormFields(Laboratory $laboratory): void
    {
        $this->name = $laboratory->name;
        $this->description = $laboratory->description;
        $this->component_ids = $laboratory->components()->pluck('id')->toArray();
        $this->pharmacological_article_id = $laboratory->pharmacological_article_id;
    }

    public function rules(): array
    {
        return [
            'name'                    => ['required', 'string', 'max:250'],
            'description'             => ['required'],
            'pharmacological_article_id' => ['required', Rule::exists('pharmacological_articles', 'id')]
        ];
    }
}