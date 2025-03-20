<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\Laboratory\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\Component;
use App\Models\Laboratory;
use App\Models\LaboratoryCheckValue;
use App\Models\LaboratoryCookingComponent;
use App\Models\LaboratoryMobilePhase;
use App\Models\LaboratoryWeightingComponent;
use App\Models\PharmacologicalArticle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;

trait HasLaboratoryForm
{
    public string $currentTab = 'index';
    public array $tabs = [
        'index'                   => [
            'title'  => 'Описание',
            'fields' => ['name', 'description']
        ],
        'storage'                 => [
            'title'  => 'Склад',
            'fields' => ['component_ids']
        ],
        'pharmacological-article' => [
            'title'  => 'ФС',
            'fields' => ['pharmacological_article_id']
        ],
        'check-values'            => [
            'title'  => 'Расчетный лист',
            'fields' => ['checkValues.*'],
        ],
        'weighting-components'    => [
            'title'  => 'Компоненты весовой',
            'fields' => ['weightingComponents.*'],
        ],
        'cooking-components'      => [
            'title'  => 'Компоненты приготовления растворов',
            'fields' => ['cookingComponents.*'],
        ],
        'mobile-phases'           => [
            'title'  => 'ПФ',
            'fields' => ['mobilePhases.*'],
        ],
        'chromatograph'           => [
            'title'  => 'Хроматограф',
            'fields' => ['chromatographColumnTemp', 'chromatographFlowSpeed', 'chromatographFlowDirection', 'chromatographValue']
        ],
    ];
    // index
    public $name = '';
    public $description = '';
    // storage
    public array $component_ids = [];
    // pharmacological-article
    public ?int $pharmacological_article_id = null;
    // check-list
    public array $checkValues = [];
    // videos
    // public ?array $videos = [];
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
        //  mount dropdown values
        $this->stuffComponents = Component::getStuffComponentsDropdownArray();
        $this->filledComponents = Component::getFilledComponentsDropdownArray();
        $this->components = Component::getDropdownArray();
        $this->pharmacologicalArticles = PharmacologicalArticle::getDropdownArray();
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
        $this->weightingComponents = $this->getWeightingComponents();
        $this->cookingComponents = $this->getCookingComponents();
        $this->mobilePhases = $this->getMobilePhases();
        $this->checkValues = $this->getCheckValues();


        $this->chromatographColumnTemp = $laboratory->chromatograph_column_temp;
        $this->chromatographFlowSpeed = $laboratory->chromatograph_flow_speed;
        $this->chromatographDetector = $laboratory->chromatograph_detector;
        $this->chromatographValue = $laboratory->chromatograph_value;

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

    public function getCheckValues()
    {
        return $this->laboratory->checkValues()->get()->toArray();
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

    public function deleteCheckValue(int $index): void
    {
        unset($this->checkValues[$index]);
    }

    public function deleteCookingComponent(int $index): void
    {

        unset($this->cookingComponents[$index]);
    }

    public function addMobilePhase(): void
    {
        $this->mobilePhases[] = [];
    }

    public function addCheckValue(): void
    {
        $this->checkValues[] = [];
    }

    public function deleteMobilePhase(int $index): void
    {

        unset($this->mobilePhases[$index]);
    }


    private function mainRules(): array
    {
        return [
            'name'                       => ['required', 'string', 'max:250'],
            'description'                => ['nullable'],
            'pharmacological_article_id' => ['required', Rule::exists('pharmacological_articles', 'id')],
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

    private function cookingComponentsRules(): array
    {
        return [
            'cookingComponents'                => ['array'],
            'cookingComponents.*.component_id' => ['required', 'integer', Rule::exists('components', 'id')],
        ];
    }

    private function checkValueRules(): array
    {
        return [
            'checkValues'             => ['array'],
            'checkValues.*.name'      => ['required', 'string', 'max:250'],
            'checkValues.*.value_min' => ['required', 'numeric', 'min:0.0000', 'max:9999.9999'],
            'checkValues.*.value_max' => ['required', 'numeric', 'min:0.0000', 'max:9999.9999'],
        ];
    }


    private function getLaboratoryMainFields(): array
    {
        return [
            'name'                       => $this->name,
            'description'                => $this->description,
            'pharmacological_article_id' => $this->pharmacological_article_id,
            'chromatograph_column_temp'  => $this->chromatographColumnTemp,
            'chromatograph_flow_speed'   => $this->chromatographFlowSpeed,
            'chromatograph_detector'     => $this->chromatographDetector,
            'chromatograph_value'        => $this->chromatographValue,
        ];
    }


    public function rules(): array
    {

        return array_merge(
            $this->mainRules(), // Описание, ФС, Хроматограф
            $this->checkValueRules(), // Расчетный лист
            $this->weightingComponentRules(), // Компоненты весовой
            $this->mobilePhasesRules(), // ПФ
            $this->cookingComponentsRules(), // Компоненты приготовления растворов
        );
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

    public function getCheckValuesModels(): array
    {
        $result = [];
        foreach ($this->checkValues as $checkValue) {
            $result[] = new LaboratoryCheckValue($checkValue);
        }
        return $result;
    }
}