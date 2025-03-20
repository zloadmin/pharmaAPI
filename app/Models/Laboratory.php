<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        'check_values'              => 'json',
        'chromatograph_column_temp' => 'float',
        'chromatograph_flow_speed'  => 'float',
        'chromatograph_detector'    => 'integer',
        'chromatograph_value'       => 'integer',
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

    public function checkValues(): HasMany
    {
        return $this->hasMany(LaboratoryCheckValue::class);
    }

    public function cookingComponents(): HasMany
    {
        return $this->hasMany(LaboratoryCookingComponent::class);
    }

    public function mobilePhases(): HasMany
    {
        return $this->hasMany(LaboratoryMobilePhase::class);
    }

    public function hasChartImage(): bool
    {

        return $this->chart_image_path && File::exists($this->getChartImageRealPath());
    }

    public function getChartImageUrl(): string
    {
        return Storage::url($this->chart_image_path);
    }

    public function getChartImageRealPath(): string
    {
//        dd(Storage::path($this->chart_image_path));
        return Storage::path($this->chart_image_path);
    }
}
