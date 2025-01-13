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

    const VIDEOS = [
        ['key' => 'before_storage_video_id', 'name' => 'Видео перед складом'],
        ['key' => 'before_weighting_video_id', 'name' => 'Видео перед весовой'],
        ['key' => 'before_cooking_video_id', 'name' => 'Видео перед вытяжной'],
        ['key' => 'before_chromatograph_page_video_id', 'name' => 'Видео перед Хроматограф (оборудование)'],
        ['key' => 'before_chromatograph_app_video_id', 'name' => 'Видео перед Хроматограф (программа)'],
    ];
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

    public function weightingComponents(): HasMany
    {
        return $this->hasMany(LaboratoryWeightingComponent::class);
    }
}
