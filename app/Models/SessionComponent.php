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

    public function mixedOneComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_one_component_id')->withTrashed();
    }

    public function mixedTwoComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_two_component_id')->withTrashed();
    }

    public function mixedThreeComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_three_component_id')->withTrashed();
    }

    public function mixedFourComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_four_component_id')->withTrashed();
    }

    public function mixedWeighedComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_weighed_component_id')->withTrashed();
    }


    public function weighedBottomComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_component_id');
    }


    public function getName()
    {
        if ($this->is_mixed) {
            return sprintf('Раствор «%s»', $this->mixedWeighedComponent->component->name ?? '');
        }
        if ($this->isFiled()) {
            return sprintf('%s с %s', $this->component->name ?? '', $this->weighedRightComponent->component->name ?? '');
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
//        if ($this->is_mixed) {
//            return '/web/images/mix.png';
//        }
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
        $result = ['Смешивание:'];
        if ($this->mixedOneComponent) {
            $result[] = $this->mixedOneComponent->getName();
        }
        if ($this->mixedTwoComponent) {
            $result[] = $this->mixedTwoComponent->getName();
        }
        if ($this->mixedThreeComponent) {
            $result[] = $this->mixedThreeComponent->getName();
        }
        if ($this->mixedFourComponent) {
            $result[] = $this->mixedFourComponent->getName();
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
     * @param Builder $query
     * @return Builder
     */
    public function scopeByPlace($query, SessionComponentPlace $place)
    {
        return $query->where('place', $place);
    }

    /**
     * Scope a query to only include in cart.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInCart($query)
    {
        return $query->where('place', SessionComponentPlace::inCart);
    }

    /**
     * Scope a query to only include on weighting table.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnWeightingTable(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onWeightingTable);
    }

    /**
     * Scope a query to only include on cooking table.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnCookingTable(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onCookingTable);
    }

    /**
     * Scope a query to only include on PH meter.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnPHMeter(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::onPHMeter);
    }

    /**
     * Scope a query to only include in filtratikon
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInFiltration(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationBox);
    }

    /**
     * Scope a query to only include in bath left box
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInBathLeftBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inBathLeftBox);
    }

    /**
     * Scope a query to only include in mix box one
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInMixBoxOne(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixBoxOne);
    }

    /**
     * Scope a query to only include in mix box two
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInMixBoxTwo(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixBoxTwo);
    }

    /**
     * Scope a query to only include in mix box three
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInMixBoxThree(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixBoxThree);
    }

    /**
     * Scope a query to only include in mix box four
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInMixBoxFour(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixBoxFour);
    }


    /**
     * Scope a query to only include in bath right box
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInBathRightBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inBathRightBox);
    }

    /**
     * Scope a query to only include in mixer
     *
     * @param Builder $query
     * @return Builder
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
            $this->component->isCanBeChoose($place, $this);
    }

    /**
     * Scope a query to only include mixed.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeMixed(Builder $query): Builder
    {
        return $query->where('is_mixed', true);
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

    static function weigh(SessionComponent $leftBoxComponent, SessionComponent $rightBoxComponent, SessionComponent $bottomBoxComponent, $value): void
    {
        // 1 save session component as weighed
        $leftBoxComponent->update([
            'is_weighed'                  => true,
            'weighed_value'               => $value,
            'weighed_left_component_id'   => $leftBoxComponent->id,
            'weighed_right_component_id'  => $rightBoxComponent->id,
            'weighed_bottom_component_id' => $bottomBoxComponent->id,
        ]);
    }
    static function cleanScales(SessionComponent|null $leftBoxComponent, SessionComponent|null $rightBoxComponent, SessionComponent|null $bottomBoxComponent): void
    {
        $leftBoxComponent?->moveToWeightingTable();
        $rightBoxComponent?->moveToWeightingTable();
        $bottomBoxComponent?->markAsDirty();
        $bottomBoxComponent?->moveToWeightingTable();
    }
}
