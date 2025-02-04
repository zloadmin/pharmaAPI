<?php

namespace App\Models;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
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
        'place' => SessionComponentPlace::class,
        'type'  => SessionComponentType::class,
    ];
    protected $guarded = [];

//    protected $with = ['component', 'weighedLeftComponent', 'weighedRightComponent', 'weighedBottomComponent'];

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'component_id');
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

    public function weighedRightSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_right_session_component_id');
    }

    public function weighedBottomSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'weighed_bottom_session_component_id');
    }


    public function mixedOneComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'mixed_one_component_id');
    }

    public function mixedTwoComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'mixed_two_component_id');
    }

    public function mixedThreeComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'mixed_three_component_id');
    }

    public function mixedFourComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'mixed_four_component_id');
    }

    public function mixedWeighedComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'mixed_weighed_component_id');
    }

    public function mixedOneSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_one_session_component_id')->withTrashed();
    }

    public function mixedTwoSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_two_session_component_id')->withTrashed();
    }

    public function mixedThreeSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_three_session_component_id')->withTrashed();
    }

    public function mixedFourSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_four_session_component_id')->withTrashed();
    }

    public function mixedWeighedSessionComponent(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mixed_weighed_session_component_id')->withTrashed();
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

    private function getMixedStuffName(): string
    {
        return $this->mixedThreeComponent->name ?? '';
    }

    private function getMixedFirstSessionComponentName(): string
    {
        return $this->mixedOneSessionComponent->getName();
    }

    private function getMixedSecondSessionComponentName(): string
    {
        return $this->mixedFourSessionComponent->getName();
    }

    private function getWeighedComponentName(): string
    {
        return $this->weighedRightComponent->name ?? '';
    }

    public function getWeighedValueFloatAttribute()
    {
        return floatval($this->weighed_value);
    }

    private function getWeighedValueInGram(): int
    {
        return $this->weighed_value_float ? intval($this->weighed_value_float * 1000) : 0;
    }

    private function getNameWeighed(): string
    {
        return sprintf('%s с %s %d мг', $this->getComponentName(), $this->getWeighedComponentName(), $this->getWeighedValueInGram());
    }

    private function getNameMobilePhase(): string
    {
        return sprintf('%s %s мг', $this->getMobilePhaseName(), $this->getMixedStuffValueName());
    }

    private function getNameMixed(): string
    {
        return sprintf('%s с %s и %s', $this->getMixedStuffName(), $this->getMixedFirstSessionComponentName(), $this->getMixedSecondSessionComponentName());
    }

    public function getName()
    {
        switch ($this->type) {
            case SessionComponentType::Weighed:
                return $this->getNameWeighed();
            case SessionComponentType::MobilePhase:
                return $this->getNameMobilePhase();
            case SessionComponentType::Mixed:
                return $this->getNameMixed();
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
        if ($this->mobilePhase) {
            return $this->mobilePhase->name;
        }
        if ($this->is_mixed) {
            return $this->getName();
        }
        return $this->component->name;
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

    public function getMixedStatus(): string
    {
        $result = ['Смешивание:'];
        $result[] = $this->mixedOneSessionComponent->getName();
        $result[] = $this->mixedTwoSessionComponent->getName();
        $result[] = $this->mixedThreeSessionComponent->getName();
        $result[] = $this->mixedFourSessionComponent->getName();

        return implode('<br>', $result);
    }


    private function isFiled(): bool
    {
        return $this->weighedRightComponent && $this->weighedLeftComponent && $this->weighed_left_component_id == $this->component_id;
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
        $this->weighedLeftSessionComponent->changePlace(SessionComponentPlace::onScalesLeftBox);
        $this->weighedRightSessionComponent->changePlace(SessionComponentPlace::onScalesRightBox);
        $this->weighedBottomSessionComponent->changePlace(SessionComponentPlace::onScalesBottomBox);
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
        return $this->weighedLeftSessionComponent && $this->weighedRightSessionComponent && $this->weighedBottomSessionComponent;
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

    static function mix(
        LaboratorySession $session,
        SessionComponent  $mixBoxOneSessionComponent,
        SessionComponent  $mixBoxTwoSessionComponent,
        SessionComponent  $mixBoxThreeSessionComponent,
        SessionComponent  $mixBoxFourSessionComponent
    ): SessionComponent
    {

        $mobilePhase = LaboratoryMobilePhase::getMobilePhaseOfComponents($session, $mixBoxOneSessionComponent, $mixBoxFourSessionComponent);

        return self::create([
            'place'           => SessionComponentPlace::onCookingTable,
            'type'            => $mobilePhase ? SessionComponentType::MobilePhase : SessionComponentType::Mixed,
            'session'         => $session->uuid,
            'component_id'    => $mixBoxThreeSessionComponent->component_id,
            'is_mixed'        => true, // TODO: delete and use type everywhere
            'mobile_phase_id' => $mobilePhase->id ?? null,

            'mixed_one_component_id'   => $mixBoxOneSessionComponent->component_id,
            'mixed_two_component_id'   => $mixBoxTwoSessionComponent->component_id,
            'mixed_three_component_id' => $mixBoxThreeSessionComponent->component_id,
            'mixed_four_component_id'  => $mixBoxFourSessionComponent->component_id,

            'mixed_one_session_component_id'     => $mixBoxOneSessionComponent->id,
            'mixed_two_session_component_id'     => $mixBoxTwoSessionComponent->id,
            'mixed_three_session_component_id'   => $mixBoxThreeSessionComponent->id,
            'mixed_four_session_component_id'    => $mixBoxFourSessionComponent->id,

            // TODO: make for first and last
            'mixed_weighed_session_component_id' => $mixBoxFourSessionComponent->weighedRightSessionComponent ? $mixBoxFourSessionComponent->weighedRightSessionComponent->id : $mixBoxFourSessionComponent->mixed_weighed_session_component_id,
            'mixed_weighed_component_id'         => $mixBoxFourSessionComponent->weighedRightComponent ? $mixBoxFourSessionComponent->weighedRightComponent->id : $mixBoxFourSessionComponent->mixed_weighed_component_id,
        ]);
    }

    static function cleanMixer(
        SessionComponent $mixBoxOneSessionComponent,
        SessionComponent $mixBoxTwoSessionComponent,
        SessionComponent $mixBoxThreeSessionComponent,
        SessionComponent $mixBoxFourSessionComponent,
    ): void
    {
        if ($mixBoxOneSessionComponent->mobilePhase) {
            $mixBoxOneSessionComponent->moveToCookingTable();
        } else {
            $mixBoxOneSessionComponent->delete();
        }


        $mixBoxTwoSessionComponent->markAsDirty();
        $mixBoxTwoSessionComponent->moveToCookingTable();

        $mixBoxThreeSessionComponent->markAsDirty();
        $mixBoxThreeSessionComponent->moveToCookingTable();

        if ($mixBoxOneSessionComponent->mobilePhase) {
            $mixBoxFourSessionComponent->moveToCookingTable();
        } else {
            $mixBoxFourSessionComponent->delete();
        }


//        $mixBoxFourSessionComponent->markAsDirtyWeigh();
//        $mixBoxFourSessionComponent->moveToCookingTable();
    }

    static function weigh(SessionComponent $leftBoxComponent, SessionComponent $rightBoxComponent, SessionComponent $bottomBoxComponent, $value): void
    {
        // 1 save session component as weighed
        $leftBoxComponent->update([
            'type'          => SessionComponentType::Weighed,
            'is_weighed'    => true, // TODO: delete and use type everywhere
            'weighed_value' => $value,

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
        $leftBoxComponent?->moveToWeightingTable();
        $rightBoxComponent?->moveToWeightingTable();
        $bottomBoxComponent?->markAsDirty();
        $bottomBoxComponent?->moveToWeightingTable();
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
