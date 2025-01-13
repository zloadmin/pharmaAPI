<?php

namespace App\Models;

use App\Enums\SessionComponent\SessionComponentPlace;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionComponent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'place' => SessionComponentPlace::class
    ];
    protected $guarded = [];

//    protected $with = ['component', 'weighedLeftComponent', 'weighedRightComponent', 'weighedBottomComponent'];

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'component_id');
    }

    public function weighedLeftComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_left_component_id');
    }

    public function weighedRightComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_right_component_id');
    }

    public function mixedLeftComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_left_component_id')->withTrashed();
    }

    public function mixedCenterComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_center_component_id')->withTrashed();
    }

    public function mixedRightComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_right_component_id')->withTrashed();
    }

    public function weighedBottomComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_component_id');
    }


    public function getName()
    {
        if ($this->is_mixed) {
            return 'Смешанный';
        }
        if ($this->isFiled()) {
            return sprintf('%s с %s', $this->component->name, $this->weighedRightComponent->name);
        }
        return $this->component->name;
    }

    public function getShortName()
    {
        if ($this->is_mixed) {
            return 'Смешанный';
        }
        return $this->component->name;
    }

    public function getImageUrl(): string
    {
        if ($this->is_mixed) {
            return '/web/images/mix.png';
        }
        return $this->component->image_url;
    }

    public function getTypeLabel(): string
    {
        if ($this->is_mixed) {
            return 'Смешеный';
        }
        return $this->component->type->label();
    }

    public function getStatus(): string
    {
        return $this->is_mixed ? $this->getMixedStatus() : $this->getSimpleStatus();
    }

    public function getSimpleStatus(): string
    {
        $result = [];
        if ($this->is_dirty) {
            $result[] = 'Грязный';
        }
        if ($this->ph_meter_value) {
            $result[] = sprintf('PH: %03.4f', $this->ph_meter_value);
        }
        if ($this->mixer_seconds) {
            $result[] = sprintf('Время в мешалке %d сек', $this->mixer_seconds);
        }
        if ($this->bath_temperature) {
            $result[] = sprintf('УК ванна %d C&deg;', $this->bath_temperature);
        }
        if ($this->bath_seconds) {
            $result[] = sprintf('УК ванна %d сек.', $this->bath_seconds);
        }
        if ($this->filtered) {
            $result[] = 'Прошло фильтрацию';
        }
        return implode('<br>', $result);
    }

    public function getMixedStatus(): string
    {
        $result = ['Состав'];
        if ($this->mixedLeftComponent) {
            $result[] = $this->mixedLeftComponent->getName();
        }
        if ($this->mixedCenterComponent) {
            $result[] = $this->mixedCenterComponent->getName();
        }
        if ($this->mixedRightComponent) {
            $result[] = $this->mixedRightComponent->getName();
        }
        return implode('<br>', $result);
    }

    private function isFiled(): bool
    {
        return
            $this->weighedRightComponent && $this->weighedLeftComponent
            && $this->weighed_left_component_id == $this->id;
    }

    /**
     * Scope a query to only include by session.
     *
     * @param Builder $query
     * @param string $session
     * @return Builder
     */
    public function scopeBySession(Builder $query, string $session): Builder
    {
        return $query->where('session', $session);
    }

    /**
     * Scope a query to only include by place.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByPlace($query, SessionComponentPlace $place)
    {
        return $query->where('place', $place);
    }

    /**
     * Scope a query to only include in cart.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInCart($query)
    {
        return $query->where('place', SessionComponentPlace::inCart);
    }

    /**
     * Scope a query to only include on weighting table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnWeightingTable(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onWeightingTable);
    }

    /**
     * Scope a query to only include on cooking table.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnCookingTable(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onCookingTable);
    }

    /**
     * Scope a query to only include on PH meter.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnPHMeter(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onPHMeter);
    }

    /**
     * Scope a query to only include in filtratikon
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInFiltration(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationBox);
    }

    /**
     * Scope a query to only include in bath left box
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInBathLeftBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inBathLeftBox);
    }

    /**
     * Scope a query to only include in mix left box
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInMixLeftBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixLeftBox);
    }

    /**
     * Scope a query to only include in mix center box
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInMixCenterBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixCenterBox);
    }

    /**
     * Scope a query to only include in mix right box
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInMixRightBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixRightBox);
    }

    /**
     * Scope a query to only include in bath right box
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInBathRightBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inBathRightBox);
    }

    /**
     * Scope a query to only include in mixer
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInMixer(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixer);
    }

    public function getValueTextAttribute(): string
    {
        if ($this->valueStuff) {
            return sprintf('%d шт', $this->valueStuff);
        }
        if ($this->valueLoose) {
            return sprintf('%.5f гм', $this->valueLoose);
        }
        if ($this->valueLiquid) {
            return sprintf('%.5f мг', $this->valueLiquid);
        }

        return '';
    }

    public function changePlace(SessionComponentPlace $place): void
    {
        $this->update(['place' => $place]);
    }

    public function moveToCart(): void
    {
        $this->changePlace(SessionComponentPlace::inCart);
    }

    public function moveToWeightingTable(): void
    {
        $this->changePlace(SessionComponentPlace::onWeightingTable);
    }

    public function markAsDirty(): void
    {
        $this->update([
            'is_dirty' => true
        ]);
    }

    public function moveToCookingTable(): void
    {
        $this->changePlace(SessionComponentPlace::onCookingTable);
    }

    public function moveToSink(): void
    {
        $this->changePlace(SessionComponentPlace::inSink);
    }

    public function moveToTableIfExistsOnPlace(SessionComponentPlace $place): void
    {
        $existsSessionComponent = self::bySession($this->session)->byPlace($place)->first();
        $existsSessionComponent?->moveToWeightingTable();
    }

    public function moveToScales(SessionComponentPlace $place): void
    {


        if ($this->isWeighed() && $this->isExistsWeighedComponents()) {
            $this->moveToTableAllScalesComponents();
            $this->moveToScalesWeighedComponents();
        } else {
            // 1 check if exists already comp and move to table them
            $this->moveToTableIfExistsOnPlace($place);
            // 2 change place
            $this->changePlace($place);
        }
    }

    public function moveToTableAllScalesComponents(): void
    {
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesLeftBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesRightBox);
        $this->moveToTableIfExistsOnPlace(SessionComponentPlace::onScalesBottomBox);
    }

    public function moveToScalesWeighedComponents(): void
    {
        $this->weighedLeftComponent->changePlace(SessionComponentPlace::onScalesLeftBox);
        $this->weighedRightComponent->changePlace(SessionComponentPlace::onScalesRightBox);
        $this->weighedBottomComponent->changePlace(SessionComponentPlace::onScalesBottomBox);
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
        return $this->weighedLeftComponent && $this->weighedRightComponent && $this->weighedBottomComponent;
    }

    public function addMixerSeconds(int $seconds): void
    {
        $this->update([
            'mixer_seconds' => $this->mixer_seconds ? $this->mixer_seconds + $seconds : $seconds
        ]);
    }

    public function addBathData(int $seconds, int $temperature): void
    {
        $this->update([
            'bath_seconds'     => $seconds,
            'bath_temperature' => $temperature
        ]);
    }

    public function markAsFiltered(): void
    {
        $this->update([
            'filtered' => true
        ]);
    }

    public function isCanBeChoose(SessionComponentPlace $place): bool
    {
        return $this->component &&
            !$this->is_dirty &&
            $this->component->isCanBeChoose($place);
    }
}
