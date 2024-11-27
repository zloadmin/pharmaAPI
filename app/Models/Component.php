<?php

namespace App\Models;

use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLiquid;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLoose;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentStuff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Component extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'type' => ComponentType::class
    ];
    public static array $booleanFields = [
        ['name' => 'main_component', 'label' => 'Основной компонент', 'description' => 'Может находится на весах в левой и правой части'],
        ['name' => 'additional_component', 'label' => 'Вспомогательный  компонент', 'description' => 'Может находится на весах в нижней части']
    ];

    public static function getDropdownArray(): array
    {
        return self::query()->pluck('name', 'id')->toArray();
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }

    public function defaultValue(): float|int
    {
        return match ($this->type) {
            ComponentType::Stuff => 1,
            ComponentType::Loose, ComponentType::Liquid => 0.00001,
        };
    }

    public function minValue(): float|int
    {
        return match ($this->type) {
            ComponentType::Stuff => 1,
            ComponentType::Loose, ComponentType::Liquid => 0.00001,
        };
    }

    public function maxValue(): float|int
    {
        return match ($this->type) {
            ComponentType::Stuff => 99,
            ComponentType::Loose, ComponentType::Liquid => 10,
        };
    }

    public function stepValue(): float|int
    {
        return match ($this->type) {
            ComponentType::Stuff => 1,
            ComponentType::Loose, ComponentType::Liquid => 0.00001,
        };
    }

    public function getValueFieldName(): string
    {
        switch ($this->type) {
            case ComponentType::Stuff:
                return 'valueStuff';
            case ComponentType::Loose:
                return 'valueLoose';
            case ComponentType::Liquid:
                return 'valueLiquid';
        }
    }

    public function isCanBeChoose(SessionComponentPlace $place): bool
    {

        return ($this->main_component && $place->isScalesLeftOrRight()) || ($this->additional_component && $place->isScalesBottom());
    }
}
