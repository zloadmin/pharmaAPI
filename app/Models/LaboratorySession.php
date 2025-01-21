<?php

namespace App\Models;

use App\Enums\Stages\Stage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class LaboratorySession extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'settings'                 => 'json',
        'chromatograph_is_set'     => 'bool',
        'chromatograph_is_turn_on' => 'bool',
        'chromatograph_is_open'    => 'bool',
        'chromatograph_replaced'   => 'bool',
        'chromatograph_pump'       => 'bool',
        'chromatograph_injector'   => 'bool',
        'check_values'             => 'json',
        'chromatograph_values'     => 'json',
        'is_lock_index'            => 'bool',
        'is_lock_storage'          => 'bool',
        'is_lock_weighting'        => 'bool',
        'is_lock_cooking'          => 'bool',
        'is_lock_chromatograph'    => 'bool',
    ];

    public function sessionComponents()
    {
        return $this->hasMany(SessionComponent::class, 'session', 'uuid');
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function getChromatographValue(string $key): mixed
    {
        return $this->chromatograph_values[$key] ?? null;
    }

    public function saveChromatographValues(array $values): void
    {
        $this->update([
            'chromatograph_values' => $values
        ]);
    }


    static function start(Laboratory $laboratory): string
    {
        return self::create([
            'user_id'       => 1, // TODO: After auth
            'uuid'          => Str::uuid(),
            'laboratory_id' => $laboratory->id
        ])->uuid;
    }

    public function isLockStage(Stage $stage): bool
    {

        return $this->{'is_lock_' . $stage->value};
    }

    public function unlockWeighting(): void
    {
        $this->update(['is_lock_weighting' => false]);
    }

    public function isCookingRoomLocked(): bool
    {
        return $this->isLockStage(Stage::cooking);
    }

    public function checkCookingRoomAbleUnlock(): bool
    {
        if ($this->sessionComponents()->weighed()->count() < $this->laboratory->weightingComponents()->count()) {
            return false;
        }

        $requiredComponents = $this->laboratory->weightingComponents()->get();
        $sessionComponents = $this->sessionComponents()->weighed()->get();
        $requiredComponentIds = [];
        $sessionComponentIds = [];
        foreach ($requiredComponents as $requiredComponent) {
            foreach ($sessionComponents as $sessionComponent) {
                if ($requiredComponent->isFitsBySessionComponent($sessionComponent)) {
                    if (!isset($requiredComponentIds[$requiredComponent->id]) && !isset($sessionComponentIds[$sessionComponent->id])) {
                        $requiredComponentIds[$requiredComponent->id] = $sessionComponent->id;
                        $sessionComponentIds[$sessionComponent->id] = $requiredComponent->id;
                    }
                }
            }
        }

        return $requiredComponents->count() == count($requiredComponentIds);
    }

    public function unlockStage(Stage $stage): void
    {
        $this->update([
            $stage->sessionModelField() => false
        ]);
    }

    public function checkCookingRoomLock(): void
    {
        if ($this->isCookingRoomLocked() && $this->checkCookingRoomAbleUnlock()) {
            $this->unlockStage(Stage::cooking);
        }
    }
}
