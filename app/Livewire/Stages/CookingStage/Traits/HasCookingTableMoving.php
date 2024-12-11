<?php
declare(strict_types=1);


namespace App\Livewire\Stages\CookingStage\Traits;


use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\SessionComponent;

trait HasCookingTableMoving
{
    public function getSessionComponentByPlace(SessionComponentPlace $place): ?SessionComponent
    {
        return SessionComponent::bySession($this->session)
            ->byPlace($place)
            ->first();
    }
    public function moveToCookingTable(SessionComponentPlace $place): void
    {
        $sessionComponent = $this->getSessionComponentByPlace($place);

        if ($sessionComponent) {
            $sessionComponent->moveToCookingTable();
            $this->dispatch('session-component-moved-to-cooking-table');
        }
    }
}