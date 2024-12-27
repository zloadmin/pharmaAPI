<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LaboratoryStep extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function (self $laboratoryStep) {
            $laboratoryStep->setPosition();
        });
        static::created(function (self $laboratoryStep) {
            $laboratoryStep->resortPosition();
        });
        static::updated(function (self $laboratoryStep) {
            $laboratoryStep->resortPosition();
        });

    }

    public function lastStepPosition(): HasOne
    {
        return $this->hasOne(LaboratoryStep::class, 'laboratory_id', 'laboratory_id')->orderByDesc('position');
    }

    public function steps(): HasOne
    {
        return $this->hasOne(LaboratoryStep::class, 'laboratory_id', 'laboratory_id');
    }

    public function setPosition(): void
    {
        $this->position = $this->lastStepPosition ? $this->lastStepPosition->position + 1 : 1;
    }

    public function resortPosition(): void
    {
        $items = $this->steps()->orderBy('position')->get();
        foreach ($items as $position => $item) {
            $item->update(['position' => $position + 1]);
        }
    }
}
