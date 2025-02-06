<?php
declare(strict_types=1);


namespace App\Models\SessionComponent;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Enums\SessionComponent\SessionComponentType;
use App\Models\Component;
use App\Models\LaboratorySession;
use App\Models\SessionComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait SessionComponentFiltrationExample
{
    /**
     * Scope a query to only include in filtration example box one
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInFiltrationExampleBoxOne(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationExampleBoxOne);
    }

    /**
     * Scope a query to only include in filtration example box two
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInFiltrationExampleBoxTwo(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationExampleBoxTwo);
    }

    /**
     * Scope a query to only include in filtration example box three
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInFiltrationExampleBoxThree(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationExampleBoxThree);
    }

    /**
     * Scope a query to only include in filtration example box four
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeInFiltrationExampleBoxFour(Builder $query): Builder
    {
        return $query->where('place', SessionComponentPlace::inFiltrationExampleBoxFour);
    }


    public function filteredExampleOneComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'filtered_example_one_component_id');
    }

    public function filteredExampleTwoComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'filtered_example_two_component_id');
    }

    public function filteredExampleThreeComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'filtered_example_three_component_id');
    }

    public function filteredExampleFourComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'filtered_example_four_component_id');
    }

    public function filteredExampleOneSessionComponent(): HasOne
    {
        return $this->hasOne(SessionComponent::class, 'id', 'filtered_example_one_session_cmp_id')->withTrashed();
    }

    public function filteredExampleTwoSessionComponent(): HasOne
    {
        return $this->hasOne(SessionComponent::class, 'id', 'filtered_example_two_session_cmp_id')->withTrashed();
    }

    public function filteredExampleThreeSessionComponent(): HasOne
    {
        return $this->hasOne(SessionComponent::class, 'id', 'filtered_example_three_session_cmp_id')->withTrashed();
    }

    public function filteredExampleFourSessionComponent(): HasOne
    {
        return $this->hasOne(SessionComponent::class, 'id', 'filtered_example_four_session_cmp_id')->withTrashed();
    }

    public function getNameFilteredExampleOneSessionComponent(): string
    {
        return $this->filteredExampleOneSessionComponent ? $this->filteredExampleOneSessionComponent->getName() : '';
    }

    public function getNameFilteredExampleThreeComponent(): string
    {
        return $this->filteredExampleThreeComponent->name ?? '';
    }

    public function getNameFilteredExample(): string
    {

        return sprintf('%s c %s',
            $this->getNameFilteredExampleThreeComponent(),
            $this->getNameFilteredExampleOneSessionComponent()
        );
    }

    static function filterExample(
        LaboratorySession $session,
        SessionComponent  $filtrationExampleBoxOne,
        SessionComponent  $filtrationExampleBoxTwo,
        SessionComponent  $filtrationExampleBoxThree,
        SessionComponent  $filtrationExampleBoxFour
    ): SessionComponent
    {
        return self::create([
            'place'                                 => SessionComponentPlace::onCookingTable,
            'type'                                  => SessionComponentType::FilteredExample,
            'session'                               => $session->uuid,
            'component_id'                          => $filtrationExampleBoxThree->component_id,
            'filtered_example_one_component_id'     => $filtrationExampleBoxOne->component_id,
            'filtered_example_two_component_id'     => $filtrationExampleBoxTwo->component_id,
            'filtered_example_three_component_id'   => $filtrationExampleBoxThree->component_id,
            'filtered_example_four_component_id'    => $filtrationExampleBoxFour->component_id,
            'filtered_example_one_session_cmp_id'   => $filtrationExampleBoxOne->id,
            'filtered_example_two_session_cmp_id'   => $filtrationExampleBoxTwo->id,
            'filtered_example_three_session_cmp_id' => $filtrationExampleBoxThree->id,
            'filtered_example_four_session_cmp_id'  => $filtrationExampleBoxFour->id,
        ]);
    }

    static function clearFilterExampleComponents(

        SessionComponent $filtrationExampleBoxOne,
        SessionComponent $filtrationExampleBoxTwo,
        SessionComponent $filtrationExampleBoxThree,
        SessionComponent $filtrationExampleBoxFour
    ): void
    {
        // One
        $filtrationExampleBoxOne->delete();
        // Two
        $filtrationExampleBoxTwo->markAsDirty();
        $filtrationExampleBoxTwo->moveToCookingTable();
        // Three
        $filtrationExampleBoxThree->markAsDirty();
        $filtrationExampleBoxThree->moveToCookingTable();
        // Four
        $filtrationExampleBoxFour->markAsDirty();
        $filtrationExampleBoxFour->moveToCookingTable();
    }
}