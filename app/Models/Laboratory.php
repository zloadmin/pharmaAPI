<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Laboratory extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $casts = [
        'check_values' => 'json'
    ];
    static array $checkValues = [
        ['name' => 'check_value_one', 'title' => 'Значение 1'],
        ['name' => 'check_value_two', 'title' => 'Значение 2'],
    ];
    static array $checkValueTypes = [
        ['name' => 'from', 'title' => 'от'],
        ['name' => 'to', 'title' => 'до'],
    ];

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Component::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(LaboratoryStep::class);
    }

    public function pharmacologicalArticle(): BelongsTo
    {
        return $this->belongsTo(PharmacologicalArticle::class);
    }
}
