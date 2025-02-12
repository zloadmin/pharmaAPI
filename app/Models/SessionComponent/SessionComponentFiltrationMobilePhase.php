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

trait SessionComponentFiltrationMobilePhase
{


    static function filterMobilePhase(LaboratorySession $session, SessionComponent $sessionComponent): SessionComponent
    {
        return self::create([
            'place'                                => SessionComponentPlace::onCookingTable,
            'type'                                 => SessionComponentType::FilteredMobilePhase,
            'session'                              => $session->uuid,
            'component_id'                         => Component::FILTERED_MOBILE_PHASE_ID,
            'filtered_mobile_phase_component_id'   => $sessionComponent->component_id,
            'filtered_mobile_phase_session_cmp_id' => $sessionComponent->id,
        ]);
    }

    static function clearFilterMobilePhaseComponent(SessionComponent $sessionComponent): void
    {
        $sessionComponent->delete();
    }

    public function filteredMobilePhaseComponent(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'filtered_mobile_phase_component_id');
    }

    public function filteredMobilePhaseSessionComponent(): HasOne
    {
        return $this->hasOne(SessionComponent::class, 'id', 'filtered_mobile_phase_session_cmp_id')->withTrashed();
    }

    public function getFilteredMobilePhaseSessionComponentName()
    {
        return $this->filteredMobilePhaseSessionComponent ? $this->filteredMobilePhaseSessionComponent->getName() : '';
    }

    public function getNameFilteredMobilePhase(): string
    {
        return sprintf('Бутыль подвижной фазы с %s', $this->getFilteredMobilePhaseSessionComponentName());
    }
}