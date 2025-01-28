<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryWeightingComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'stuff_component_id',
        'filled_component_id',
        'value_min',
        'value_max'
    ];
    protected $casts = [
        'value_min' => 'decimal:4',
        'value_max' => 'decimal:4',
    ];

    public function isFitsBySessionComponent(SessionComponent $sessionComponent): bool
    {

        // if not same stuff
        if ($this->stuff_component_id != $sessionComponent->component_id) {
            return false;
        }
        // if not same filled
        if ($this->filled_component_id != $sessionComponent->weighedRightSessionComponent->component_id) {
            return false;
        }

        // if weighed value less then minimal
        if (floatval($this->value_min) > floatval($sessionComponent->weighed_value)) {
            return false;
        }
        // if weighed value more then maximum
        if (floatval($this->value_max) < floatval($sessionComponent->weighed_value)) {
            return false;
        }
        return true;
    }
}
