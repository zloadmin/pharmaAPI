<?php

namespace App\Models;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType as SessionComponentTypeEnum;

use App\Models\SessionComponent\SessionComponentFiltrationExample;
use App\Models\SessionComponent\SessionComponentFiltrationMobilePhase;
use App\Models\SessionComponent\SessionComponentMix;
use App\Models\SessionComponent\SessionComponentMove;
use App\Models\SessionComponent\SessionComponentType;
use App\Models\SessionComponent\SessionComponentWeigh;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionComponent extends Model
{
    use HasFactory;
    use SoftDeletes;

    use SessionComponentType;
    use SessionComponentFiltrationExample;
    use SessionComponentMix;
    use SessionComponentWeigh;
    use SessionComponentMove;
    use SessionComponentFiltrationMobilePhase;


    protected $casts = [
        'place' => SessionComponentPlace::class,
        'type'  => SessionComponentTypeEnum::class,
    ];
    protected $guarded = [];

//    protected $with = ['component', 'weighedLeftComponent', 'weighedRightComponent', 'weighedBottomComponent'];

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'component_id');
    }

    public function mobilePhase(): HasOne
    {
        return $this->hasOne(LaboratoryMobilePhase::class, 'id', 'mobile_phase_id');
    }

    public function getWeighedOrMainComponentId()
    {
        return $this->weighed_right_component_id ?? $this->component_id;
    }

    private function getComponentName(): string
    {
        return $this->component->name ?? '';
    }

    private function getMobilePhaseName(): string
    {
        return $this->mobilePhase->name ?? '';
    }

    private function getMixedStuffValueName(): string
    {
        return $this->mixedThreeComponent->value ?? '';
    }

    private function getNameMobilePhase(): string
    {
        return sprintf('%s %s мг', $this->getMobilePhaseName(), $this->getMixedStuffValueName());
    }


    public function getName()
    {
//        $postfix = $this->bath_temperature ? ' после УЗ' : '';
//        $postfix .= $this->ph_meter_value ? ' рН ' . $this->ph_meter_value : '';

        $postfix = '';
        return $this->getNameWithoutPostfix() . $postfix;
    }

    public function getNameWithoutPostfix()
    {

        switch ($this->type) {
            case SessionComponentTypeEnum::Weighed:
                return $this->getNameWeighed();
            case SessionComponentTypeEnum::MobilePhase:
                return $this->getNameMobilePhase();
            case SessionComponentTypeEnum::Mixed:
                return $this->getNameMixed();
            case SessionComponentTypeEnum::FilteredExample:
                return $this->getNameFilteredExample();
            case SessionComponentTypeEnum::FilteredMobilePhase:
                return $this->getNameFilteredMobilePhase();
        }

        if ($this->mobilePhase) {
            return $this->mobilePhase->name;
        }
        if ($this->is_mixed) {
            return sprintf('%s с %s и %s', $this->component->name ?? '', $this->mixedWeighedComponent->name ?? '', $this->mixedOneComponent->name ?? '');
        }
        if ($this->isFiled()) {
            return sprintf('%s с %s', $this->component->name ?? '', $this->weighedRightComponent->name ?? '');
        }
        return $this->component->name;
    }


    public function getShortName()
    {
        return $this->component->short_name;
    }

    public function getImageUrl(): string
    {
//        if ($this->is_mixed) {
//            return '/web/images/mix.png';
//        }
        if (is_null($this->component)) {
            dd($this);
        }
        return $this->component->image_url;
    }

    public function getTypeLabel(): string
    {
        if ($this->mobilePhase) {
            return 'Подвижная фаза';
        }

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
        return $query->where('place', SessionComponentPlace::inFiltrationMobilePhaseBox);
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
     * Scope a query to only include in chromatograph example left box
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInChromatographExampleLeftBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inChromatographExampleLeftBox);
    }

    /**
     * Scope a query to only include in chromatograph example right box
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInChromatographExampleRightBox(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inChromatographExampleRightBox);
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

    public function markAsDirty(): void
    {
        $this->update([
            'is_dirty' => true
        ]);
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


    public function markAsDirtyWeigh(): void
    {
        $this->update([
            'is_weighed'                          => false,
            'is_dirty'                            => true,
            'component_id'                        => $this->weighed_left_component_id ?? $this->mixed_three_component_id, // weighed or mixed
            'weighed_left_component_id'           => null,
            'weighed_right_component_id'          => null,
            'weighed_bottom_component_id'         => null,
            'weighed_left_session_component_id'   => null,
            'weighed_right_session_component_id'  => null,
            'weighed_bottom_session_component_id' => null,
            'weighed_value'                       => null,
        ]);
    }
}
