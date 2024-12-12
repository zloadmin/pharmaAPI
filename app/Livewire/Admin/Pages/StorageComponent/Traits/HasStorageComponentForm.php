<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Pages\StorageComponent\Traits;


use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

trait HasStorageComponentForm
{
    use WithFileUploads;

    public $name = '';
    public $short_name = '';
    public $description = '';
    public $type = '';
    public $image = '';
    public $padding_top = 0.0;
    public $padding_right = 0.0;
    public $on_scales_place = '';
    public $weight = 0;
    public $ph_meter_able = false;
    public $ph_meter_value = 0.0;
    public $mixer_able = false;
    public $bath_able = false;
    public $filtration_able = false;

    public function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:250'],
            'short_name'      => ['required', 'string', 'max:15'],
            'description'     => ['required', 'string'],
            'type'            => ['required', Rule::in(ComponentType::values())],
            'image'           => ['required', 'image'],
            'padding_top'     => ['required', 'numeric', 'min:0.001', 'max:100'],
            'padding_right'   => ['required', 'numeric', 'min:0.001', 'max:100'],
            'on_scales_place' => ['required', Rule::in(SessionComponentPlace::getOnScalesValues())],
            'weight'          => ['numeric', 'min:0', 'max:10'],
            'ph_meter_able'   => ['required', 'boolean'],
            'ph_meter_value'  => ['required', 'numeric', 'min:0', 'max:999.9999'],
            'mixer_able'      => ['required', 'boolean'],
            'bath_able'       => ['required', 'boolean'],
            'filtration_able' => ['required', 'boolean'],
        ];
    }
}