<?php
declare(strict_types=1);


namespace App\Models\SessionComponent;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\Component;
use App\Models\LaboratoryMobilePhase;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait SessionComponentMix
{

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

    private function getMixedFirstSessionComponentName(): string
    {
        return $this->mixedOneSessionComponent->getName();
    }

    private function getMixedSecondSessionComponentName(): string
    {
        return $this->mixedFourSessionComponent->getName();
    }

    private function getMixedStuffName(): string
    {
        return $this->mixedThreeComponent->name ?? '';
    }

    private function getNameMixed(): string
    {
        return sprintf('%s с %s и %s', $this->getMixedStuffName(), $this->getMixedFirstSessionComponentName(), $this->getMixedSecondSessionComponentName());
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
     * Scope a query to only include in mixer
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInMixer(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inMixer);
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

}