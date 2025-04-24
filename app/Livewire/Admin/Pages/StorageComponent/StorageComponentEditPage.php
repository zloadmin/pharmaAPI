<?php

namespace App\Livewire\Admin\Pages\StorageComponent;

use App\Enums\Component\ComponentNamingType;
use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Admin\Pages\StorageComponent\Traits\HasStorageComponentForm;
use App\Livewire\Admin\Traits\HasBreadcrumb;
use App\Livewire\Admin\Traits\HasRedirects;
use App\Models\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Title;
use Livewire\Component as LivewireComponent;

class StorageComponentEditPage extends LivewireComponent
{
    use HasBreadcrumb;
    use HasStorageComponentForm;
    use HasRedirects;

    public Component $storageComponent;

    public function rules(): array
    {

        return [
            'name'                         => ['required', 'string', 'max:250'],
            'short_name'                   => ['required', 'string', 'max:15'],
            'description'                  => ['required', 'string'],
            'type'                         => ['required', Rule::in(ComponentType::values())],
            'naming_type'                  => ['nullable', Rule::in(ComponentNamingType::values())],
            'image'                        => ['nullable', 'image'],
            'padding_top'                  => ['required', 'numeric', 'min:0.001', 'max:100'],
            'padding_right'                => ['required', 'numeric', 'min:0.001', 'max:100'],
            'on_scales_place'              => ['required', Rule::in(SessionComponentPlace::getOnScalesValues())],
            'weight'                       => ['numeric', 'min:0', 'max:10'],
            'ph_meter_able'                => ['required', 'boolean'],
            'ph_meter_value'               => ['required', 'numeric', 'min:0', 'max:999.9999'],
            //            'mixer_able'      => ['required', 'boolean'],
            'on_mix_place'                 => ['nullable', Rule::in(SessionComponentPlace::getMixStuffPlaceValues())],
            'on_filtration_examples_place' => ['nullable', Rule::in(SessionComponentPlace::getFiltrationExamplesPlaceValues())],
            'bath_able'                    => ['required', 'boolean'],
            'filtration_able'              => ['required', 'boolean'],
            'is_example'                   => ['required', 'boolean'],
        ];
    }

    public function mount(Component $storageComponent): void
    {
        $this->setStorageComponent($storageComponent);
        $this->setFormFields($storageComponent);
    }

    #[Title('Редактировать')]
    public function render()
    {
        return view('livewire.admin.pages.storage-component.storage-component-edit-page')
            ->layoutData([
                'breadcrumb' => $this->getStorageComponentEditPageBreadcrumb($this->storageComponent)
            ]);
    }

    public function save(): void
    {
        $this->validate();
        $this->updatedStorageComponent();
        $this->redirectToStorageComponentsPage();

    }

    private function updatedStorageComponent(): void
    {


        $this->storageComponent->name = $this->name;
        $this->storageComponent->short_name = $this->short_name;
        $this->storageComponent->description = $this->description;
        $this->storageComponent->type = $this->type;
        $this->storageComponent->naming_type = $this->naming_type;
        if ($this->image) {
            $this->storageComponent->image = $this->image->store(path: 'storage_components');
        }
        $this->storageComponent->padding_top = $this->padding_top;
        $this->storageComponent->padding_right = $this->padding_right;
        $this->storageComponent->on_scales_place = $this->on_scales_place;
        $this->storageComponent->weight = $this->weight;
        $this->storageComponent->value = $this->value ?? null;
        $this->storageComponent->ph_meter_able = $this->ph_meter_able;
        $this->storageComponent->ph_meter_value = $this->ph_meter_value;
//        $this->storageComponent->mixer_able = $this->mixer_able;
        $this->storageComponent->on_mix_place = $this->on_mix_place ?: null;
        $this->storageComponent->on_filtration_examples_place = $this->on_filtration_examples_place ?: null;
        $this->storageComponent->bath_able = $this->bath_able;
        $this->storageComponent->filtration_able = $this->filtration_able;
        $this->storageComponent->is_example = $this->is_example;

        $this->storageComponent->update();
    }

    private function redirectToStorageComponentsPage(): void
    {
        $this->redirectRoute('admin.components-page', [], true, true);
    }

    private function setStorageComponent(Component $storageComponent): void
    {
        $this->storageComponent = $storageComponent;
    }

    private function setFormFields(Component $storageComponent): void
    {
        $this->name = $storageComponent->name;
        $this->short_name = $storageComponent->short_name;
        $this->description = $storageComponent->description;
        $this->type = $storageComponent->type->value;
        $this->naming_type = $storageComponent->naming_type->value ?? null;
        $this->padding_top = $storageComponent->padding_top;
        $this->padding_right = $storageComponent->padding_right;
        $this->on_scales_place = $storageComponent->on_scales_place->value;
        $this->weight = $storageComponent->weight;
        $this->value = $storageComponent->value ?? null;
        $this->ph_meter_able = $storageComponent->ph_meter_able;
        $this->ph_meter_value = $storageComponent->ph_meter_value;
//        $this->mixer_able = $storageComponent->mixer_able;
        $this->on_mix_place = $storageComponent->on_mix_place->value ?? '';
        $this->on_filtration_examples_place = $storageComponent->on_filtration_examples_place->value ?? '';
        $this->bath_able = $storageComponent->bath_able;
        $this->filtration_able = $storageComponent->filtration_able;
        $this->is_example = $storageComponent->is_example;
    }

}
