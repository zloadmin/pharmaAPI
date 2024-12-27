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
        'pharmacological-article' => 'ФС',
        'check-list'              => 'Расчетный лист',
        //        'weighing' => 'Весовая'
    ];
    // index
    public $name = '';
    public $description = '';
    // storage
    public array $component_ids = [];
    // pharmacological-article
    public ?int $pharmacological_article_id = null;
    // check-list
    public ?array $check_values = [];


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
        $this->check_values = $laboratory->check_values;
    }

    public function initCheckValues(Laboratory $laboratory = null)
    {
        foreach (Laboratory::$checkValues as $checkValue) {
            foreach (Laboratory::$checkValueTypes as $checkValueType) {
                $fieldName = $checkValue['name'] . '_' . $checkValueType['name'];
                if ($laboratory) {
                    $this->check_values[$fieldName] = $laboratory->check_values[$fieldName] ?? null;
                } else {
                    $this->check_values[$fieldName] = null;
                }
            }
        }
    }

    public function rules(): array
    {
        $mainFields = [
            'name'                       => ['required', 'string', 'max:250'],
            'description'                => ['required'],
            'pharmacological_article_id' => ['required', Rule::exists('pharmacological_articles', 'id')],
            'check_values'               => ['required', 'array']
        ];
        $checkValueFields = [];
        foreach (Laboratory::$checkValues as $checkValue) {
            foreach (Laboratory::$checkValueTypes as $checkValueType) {
                $fieldName = 'check_values.' . $checkValue['name'] . '_' . $checkValueType['name'];
                $checkValueFields[$fieldName] = ['required', 'numeric', 'min:0.0001', 'max:999.9999'];
//                if ($checkValueType['name'] == 'from') {
//                    $checkValueFields[$fieldName][] = 'lte:' . $checkValue['name'] . '_to';
//                } else {
//                    $checkValueFields[$fieldName][] = 'gte:' . $checkValue['name'] . '_from';
//                }
            }
        }

        return $mainFields + $checkValueFields;

    }
}