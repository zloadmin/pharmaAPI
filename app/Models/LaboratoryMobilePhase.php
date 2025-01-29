<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryMobilePhase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_component_id',
        'second_component_id',
    ];

    static function getMobilePhaseOfComponents(LaboratorySession $session, SessionComponent $firstComponent, SessionComponent $secondComponent): null|self
    {
        $mobilePhases = $session->laboratory->mobilePhases()->get();

        foreach ($mobilePhases as $mobilePhase) {
            if ($mobilePhase->first_component_id == $firstComponent->getWeighedOrMainComponentId() && $mobilePhase->second_component_id == $secondComponent->getWeighedOrMainComponentId()) {
                return $mobilePhase;
            }
        }
        return null;
    }
}
