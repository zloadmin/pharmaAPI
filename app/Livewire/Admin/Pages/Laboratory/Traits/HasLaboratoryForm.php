<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\Component;
use App\Models\Laboratory;
use App\Models\LaboratoryCookingComponent;
use App\Models\LaboratoryMobilePhase;
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
        'weighting-components'    => 'Компоненты весовой',
        'cooking-components'      => 'Компоненты приготовления растворов',
        'mobile-phases'           => 'Подвижные фазы',
        'chromatograph'           => 'Хроматограф'
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
    // cooking-components
    public array $cookingComponents = [];
    // mobile-phases
    public array $mobilePhases = [];

    public array $stuffComponents = [];
    public array $filledComponents = [];
    public array $components = [];
    // chromatograph
    public ?float $chromatographColumnTemp;
    public ?float $chromatographFlowSpeed;
    public ?int $chromatographDetector;
    public ?int $chromatographValue;


    public function mountHasLaboratoryForm(): void
    {
        $this->stuffComponents = Component::getStuffComponentsDropdownArray();
        $this->filledComponents = Component::getFilledComponentsDropdownArray();
        $this->components = Component::getDropdownArray();
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
        $this->cookingComponents = $this->getCookingComponents();
        $this->mobilePhases = $this->getMobilePhases();


        $this->chromatographColumnTemp = $laboratory->chromatograph_column_temp;
        $this->chromatographFlowSpeed = $laboratory->chromatograph_flow_speed;
        $this->chromatographDetector = $laboratory->chromatograph_detector;
        $this->chromatographValue = $laboratory->chromatograph_value;

        // load videos
        foreach (Laboratory::VIDEOS as $video) {
            $this->videos[$video['key']] = $laboratory->{$video['key']};
        }

    }

    public function getWeightingComponents()
    {
        return $this->laboratory->weightingComponents()->get()->toArray();
    }

    public function getCookingComponents()
    {
        return $this->laboratory->cookingComponents()->get()->toArray();
    }

    public function getMobilePhases()
    {
        return $this->laboratory->mobilePhases()->get()->toArray();
    }

    public function addWeightingComponents(): void
    {
        $this->weightingComponents[] = [];
    }

    public function addCookingComponents(): void
    {
        $this->cookingComponents[] = [];
    }


    public function deleteWeightingComponent(int $index): void
    {

        unset($this->weightingComponents[$index]);
    }

    public function deleteCookingComponent(int $index): void
    {

        unset($this->cookingComponents[$index]);
    }

    public function addMobilePhase(): void
    {
        $this->mobilePhases[] = [];
    }

    public function deleteMobilePhase(int $index): void
    {

        unset($this->mobilePhases[$index]);
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
            'check_values'               => ['required', 'array'],
            'chromatographColumnTemp'    => ['required', 'numeric', 'between:0.1,999.9'],
            'chromatographFlowSpeed'     => ['required', 'numeric', 'between:0.001,999.999'],
            'chromatographDetector'      => ['required', 'numeric', 'between:1,9999999'],
            'chromatographValue'         => ['required', 'numeric', 'between:1,9999999'],
        ];
    }

    private function weightingComponentRules(): array
    {
        return [
            'weightingComponents'                       => ['array'],
            'weightingComponents.*.stuff_component_id'  => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesLeftBox)],
            'weightingComponents.*.filled_component_id' => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesRightBox)],
            'weightingComponents.*.value_min'           => ['required', 'numeric', 'min:0.0000', 'max:9999.9999'],
            'weightingComponents.*.value_max'           => ['required', 'numeric', 'min:0.0000', 'max:9999.9999'],
        ];
    }

    private function mobilePhasesRules(): array
    {
        return [
            'mobilePhases'                       => ['array'],
            'mobilePhases.*.name'                => ['required', 'string', 'max:250'],
            'mobilePhases.*.first_component_id'  => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesRightBox)],
            'mobilePhases.*.second_component_id' => ['required', 'integer', Rule::exists('components', 'id')->where('on_scales_place', SessionComponentPlace::onScalesRightBox)],
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
            'chromatograph_column_temp'  => $this->chromatographColumnTemp,
            'chromatograph_flow_speed'   => $this->chromatographFlowSpeed,
            'chromatograph_detector'     => $this->chromatographDetector,
            'chromatograph_value'        => $this->chromatographValue,
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
        return $this->mainRules() + $this->checkValueRules() + $this->videoRules() + $this->weightingComponentRules() + $this->mobilePhasesRules();
    }

    public function getWeightingComponentModels(): array
    {
        $result = [];
        foreach ($this->weightingComponents as $weightingComponent) {
            $result[] = new LaboratoryWeightingComponent($weightingComponent);
        }
        return $result;
    }

    public function getCookingComponentModels(): array
    {
        $result = [];
        foreach ($this->cookingComponents as $cookingComponent) {
            $result[] = new LaboratoryCookingComponent($cookingComponent);
        }
        return $result;
    }

    public function getMobilePhasesModels(): array
    {
        $result = [];
        foreach ($this->mobilePhases as $mobilePhase) {
            $result[] = new LaboratoryMobilePhase($mobilePhase);
        }
        return $result;
    }
}