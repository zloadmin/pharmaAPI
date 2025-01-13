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
}
