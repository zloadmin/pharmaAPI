<?php

namespace App\Models;

use App\Enums\StorageComponent\StorageComponentType;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLiquid;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLoose;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentStuff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StorageComponent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'type' => StorageComponentType::class
    ];

    public static function getDropdownArray(): array
    {
        return self::query()->pluck( 'name', 'id')->toArray();
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }

    public function defaultValue(): float|int
    {
        return match ($this->type) {
            StorageComponentType::Stuff => 1,
            StorageComponentType::Loose, StorageComponentType::Liquid => 0.00001,
        };
    }

    public function minValue(): float|int
    {
        return match ($this->type) {
            StorageComponentType::Stuff => 1,
            StorageComponentType::Loose, StorageComponentType::Liquid => 0.00001,
        };
    }

    public function maxValue(): float|int
    {
        return match ($this->type) {
            StorageComponentType::Stuff => 99,
            StorageComponentType::Loose, StorageComponentType::Liquid => 10,
        };
    }

    public function stepValue(): float|int
    {
        return match ($this->type) {
            StorageComponentType::Stuff => 1,
            StorageComponentType::Loose, StorageComponentType::Liquid => 0.00001,
        };
    }

    public function getValueFieldName(): string
    {
        switch ($this->type) {
            case StorageComponentType::Stuff:
                return 'valueStuff';
            case StorageComponentType::Loose:
                return 'valueLoose';
            case StorageComponentType::Liquid:
                return 'valueLiquid';
        }
    }
}
