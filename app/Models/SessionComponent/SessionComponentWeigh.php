<?php
declare(strict_types=1);


namespace App\Models\SessionComponent;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\Component;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait SessionComponentWeigh
{
    static function weigh(SessionComponent $leftBoxComponent, SessionComponent $rightBoxComponent, SessionComponent $bottomBoxComponent, $value): void
    {
//        // 1 save session component as weighed
//        $leftBoxComponent->update([
//            'type'          => SessionComponentType::Weighed,
//            'is_weighed'    => true, // TODO: delete and use type everywhere
//            'weighed_value' => $value,
//
//            'weighed_left_session_component_id'   => $leftBoxComponent->id,
//            'weighed_right_session_component_id'  => $rightBoxComponent->id,
//            'weighed_bottom_session_component_id' => $bottomBoxComponent->id,
//
//            'weighed_left_component_id'   => $leftBoxComponent->component_id,
//            'weighed_right_component_id'  => $rightBoxComponent->component_id,
//            'weighed_bottom_component_id' => $bottomBoxComponent->component_id,
//        ]);
        SessionComponent::create([
            'type'          => SessionComponentType::Weighed,
            'place'         => SessionComponentPlace::onWeightingTable,
            'is_weighed'    => true, // TODO: delete and use type everywhere
            'weighed_value' => $value,
            'component_id'  => $leftBoxComponent->component_id,
            'session'       => $leftBoxComponent->session,

            'weighed_left_session_component_id'   => $leftBoxComponent->id,
            'weighed_right_session_component_id'  => $rightBoxComponent->id,
            'weighed_bottom_session_component_id' => $bottomBoxComponent->id,

            'weighed_left_component_id'   => $leftBoxComponent->component_id,
            'weighed_right_component_id'  => $rightBoxComponent->component_id,
            'weighed_bottom_component_id' => $bottomBoxComponent->component_id,
        ]);
    }

    static function cleanScales(SessionComponent|null $leftBoxComponent, SessionComponent|null $rightBoxComponent, SessionComponent|null $bottomBoxComponent): void
    {
        $leftBoxComponent?->delete();
        $rightBoxComponent?->moveToWeightingTable();
        $bottomBoxComponent?->markAsDirty();
        $bottomBoxComponent?->moveToWeightingTable();
    }

    public function weighedLeftComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'weighed_left_component_id');
    }

    public function weighedRightComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'weighed_right_component_id');
    }

    public function weighedBottomComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'weighed_bottom_component_id');
    }

    public function weighedLeftSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_left_session_component_id');
    }

    public function weighedLeftSessionComponentWithTrashed(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_left_session_component_id')->withTrashed();
    }

    public function weighedRightSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_right_session_component_id');
    }

    public function weighedRightSessionComponentWithTrashed(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_right_session_component_id')->withTrashed();
    }

    public function weighedBottomSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_session_component_id');
    }

    public function weighedBottomSessionComponentWithTrashed(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_session_component_id')->withTrashed();
    }

    private function getWeighedComponentName(): string
    {
        return $this->weighedRightComponent->name ?? '';
    }

    public function getWeighedValueFloatAttribute(): float
    {
        return floatval($this->weighed_value);
    }


    private function getNameWeighed(): string
    {
        // naming #1
        return sprintf('%s с %s %.04f г', $this->getComponentName(), $this->getWeighedComponentName(), $this->weighed_value_float);
    }

    public function isWeighed(): bool
    {
        return !!$this->is_weighed;
    }

    public function isHasWeighedValue(): bool
    {
        return $this->is_weighed && $this->weighed_value;
    }

    public function isExistsWeighedComponents(): bool
    {
        return $this->weighedLeftSessionComponentWithTrashed && $this->weighedRightSessionComponentWithTrashed && $this->weighedBottomSessionComponentWithTrashed;
    }

    /**
     * Scope a query to only include weighed.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeWeighed(Builder $query): Builder
    {
        return $query->where('is_weighed', true);
    }

    private function isFiled(): bool
    {
        return $this->weighedRightComponent && $this->weighedLeftComponent && $this->weighed_left_component_id == $this->component_id;
    }

}