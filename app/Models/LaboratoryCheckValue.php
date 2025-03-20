<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryCheckValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value_min',
        'value_max',
    ];
}
