<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\Component;
use App\Models\Laboratory;
use App\Models\LaboratoryWeightingComponent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;

trait HasLaboratoryForm
{
    public string $currentTab = 'index';
    public array $tabs = [
        'index'                   => 'Описание',
        'storage'                 => 'Склад',
        'pharmacological-article' => 'ФС',
        'videos'                  => 'Обучающее видео',
        'check-list'              => 'Расчетный лист',
        'weighting-components'    => 'Компоненты весовой'
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
    // videos
    public ?array $videos = [];
    // weighting-components
    public array $weightingComponents = [];

    public array $stuffComponents = [];
    public array $filledComponents = [];


    public function mountHasLaboratoryForm(): void
    {
        $this->stuffComponents = Component::getStuffComponentsDropdownArray();
        $this->filledComponents = Component::getFilledComponentsDropdownArray();
    }

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
        $this->weightingComponents = $this->getWeightingComponents();

        // load videos
        foreach (Laboratory::VIDEOS as $video) {
            $this->videos[$video['key']] = $laboratory->{$video['key']};
        }

    }

    public function getWeightingComponents()
    {
        return $this->laboratory->weightingComponents()->get()->toArray();
    }

    public function addWeightingComponents(): void
    {
        $this->weightingComponents[] = [];
    }

    public function deleteWeightingComponent(int $index): void
    {

        unset($this->weightingComponents[$index]);
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

    private function mainRules(): array
    {
        return [
            'name'                       => ['required', 'string', 'max:250'],
            'description'                => ['required'],
            'pharmacological_article_id' => ['required', Rule::exists('pharmacological_articles', 'id')],
            'check_values'               => ['required', 'array']
        ];
    }

    private function weightingComponentRules(): array
    {
        return [
            'weightingComponents'                       => ['array'],
            'weightingComponents.*.stuff_component_id'  => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesLeftBox)],
            'weightingComponents.*.filled_component_id' => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesRightBox)],
            'weightingComponents.*.value_min'           => ['required', 'numeric', 'min:0.0001', 'max:9999.9999'],
            'weightingComponents.*.value_max'           => ['required', 'numeric', 'min:0.0001', 'max:9999.9999'],
        ];
    }

    private function checkValueRules(): array
    {
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
        return $checkValueFields;
    }

    private function videoRules(): array
    {
        $result = [];
        foreach (Laboratory::VIDEOS as $video) {
            $result['videos.' . $video['key']] = [
                'required',
                'integer',
                Rule::exists('videos', 'id'),
            ];
        }
        return $result;
    }

    private function getLaboratoryMainFields(): array
    {
        return [
            'name'                       => $this->name,
            'description'                => $this->description,
            'pharmacological_article_id' => $this->pharmacological_article_id,
            'check_values'               => $this->check_values,
        ];
    }

    private function getLaboratoryVideoFields(): array
    {
        $result = [];
        foreach (Laboratory::VIDEOS as $video) {
            $result[$video['key']] = $this->videos[$video['key']];
        }
        return $result;
    }

    public function rules(): array
    {
        return $this->mainRules() + $this->checkValueRules() + $this->videoRules() + $this->weightingComponentRules();
    }

    public function getWeightingComponentModels(): array
    {
        $result = [];
        foreach ($this->weightingComponents as $weightingComponent) {
            $result[] = new LaboratoryWeightingComponent($weightingComponent);
        }
        return $result;
    }
}