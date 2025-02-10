<?php

namespace App\Models;

use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLiquid;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentLoose;
use App\Livewire\Stages\StorageStage\StorageComponents\ComponentStuff;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Component extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'type'                         => ComponentType::class,
        'on_scales_place'              => SessionComponentPlace::class,
        'on_mix_place'                 => SessionComponentPlace::class,
        'on_filtration_examples_place' => SessionComponentPlace::class,
        'ph_meter_able'                => 'bool',
        'mixer_able'                   => 'bool',
        'bath_able'                    => 'bool',
        'filtration_able'              => 'bool',
        'mix_able'                     => 'bool',
        'is_example'                   => 'bool',
        'ph_meter_value'               => 'decimal:4'
    ];

    /**
     * Scope a query to only include by scales place.
     *
     * @param Builder $query
     * @param SessionComponentPlace $place
     * @return Builder
     */
    public function scopeByScalesPlace(Builder $query, SessionComponentPlace $place): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('on_scales_place', $place);
    }

    public static function getDropdownArray(): array
    {
        return self::query()->where('is_example', false)->pluck('name', 'id')->toArray();
    }
    public static function getAnyDropdownArray(): array
    {
        return self::query()->pluck('name', 'id')->toArray();
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }

    public function defaultValue(): float|int
    {
        return 1;
//        return match ($this->type) {
////            ComponentType::Stuff => 1,
//            ComponentType::Loose, ComponentType::Liquid => 0.00001,
//        };
    }

    public function minValue(): float|int
    {
        return 1;
//        return match ($this->type) {
////            ComponentType::Stuff => 1,
//            ComponentType::Loose, ComponentType::Liquid => 0.00001,
//        };
    }

    public function maxValue(): float|int
    {
        return 99;
//        return match ($this->type) {
////            ComponentType::Stuff => 99,
//            ComponentType::Loose, ComponentType::Liquid => 10,
//        };
    }

    public function stepValue(): float|int
    {
        return 1;
//        return match ($this->type) {
////            ComponentType::Stuff => 1,
//            ComponentType::Loose, ComponentType::Liquid => 0.00001,
//        };
    }

    public function getValueFieldName(): string
    {
        switch ($this->type) {
//            case ComponentType::Stuff:
//                return 'valueStuff';
            case ComponentType::Loose:
                return 'valueLoose';
            case ComponentType::Liquid:
                return 'valueLiquid';
        }
    }

    public function isCanBeChoose(SessionComponentPlace $place, SessionComponent $sessionComponent): bool
    {

        switch ($place) {
            case SessionComponentPlace::onPHMeter:
                return $this->ph_meter_able;
            case SessionComponentPlace::inMixer:
                return $this->mixer_able;
            case SessionComponentPlace::inBathLeftBox:
            case SessionComponentPlace::inBathRightBox:
                return $this->bath_able;
            case SessionComponentPlace::inFiltrationMobilePhaseBox:
                return $this->filtration_able && $sessionComponent->isTypeMixed();
            case SessionComponentPlace::inMixBoxOne:
                return $this->on_mix_place === $place || $sessionComponent->is_mixed;
            case SessionComponentPlace::inMixBoxTwo:
            case SessionComponentPlace::inMixBoxThree:
                return $this->on_mix_place === $place && !$sessionComponent->is_mixed;
            case SessionComponentPlace::inMixBoxFour:
                return $sessionComponent->is_weighed || $sessionComponent->is_mixed;
            case SessionComponentPlace::inFiltrationExampleBoxOne:
                return $sessionComponent->isTypeMixed() && $this->on_filtration_examples_place == $place;
            case SessionComponentPlace::inFiltrationExampleBoxTwo:
            case SessionComponentPlace::inFiltrationExampleBoxThree:
            case SessionComponentPlace::inFiltrationExampleBoxFour:
                return $sessionComponent->isTypeSimple() && $this->on_filtration_examples_place === $place;
            default:
                return $this->on_scales_place === $place;
        }

    }

    static function getStuffComponentsDropdownArray(): array
    {
        return self::query()->byScalesPlace(SessionComponentPlace::onScalesLeftBox)->pluck('name', 'id')->toArray();
    }

    static function getFilledComponentsDropdownArray(): array
    {
        return self::query()->where('is_example', false)->byScalesPlace(SessionComponentPlace::onScalesRightBox)->pluck('name', 'id')->toArray();
    }
}
