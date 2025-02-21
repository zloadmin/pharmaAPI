<?php

namespace App\Models;

use App\Enums\Chromatograph\ChromatographStatusColumns;
use App\Enums\Chromatograph\ChromatographStatusEntries;
use App\Enums\Chromatograph\ChromatographStatusFlushValve;
use App\Enums\Chromatograph\ChromatographStatusInstalledJars;
use App\Enums\Chromatograph\ChromatographStatusIntroduceSample;
use App\Enums\Chromatograph\ChromatographStatusPump;
use App\Enums\Chromatograph\ChromatographStatusSoftWare;
use App\Enums\Chromatograph\ChromatographStatusTurnOn;
use App\Enums\SessionComponent\SessionComponentType;
use App\Enums\Stages\Stage;
use App\Models\LaboratorySession\LaboratorySessionChromatograph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class LaboratorySession extends Model
{
    use HasFactory;
    use LaboratorySessionChromatograph;


    protected $guarded = [];

    protected $casts = [
        'settings'              => 'json',
        //        'chromatograph_is_set'     => 'bool',
        //        'chromatograph_is_turn_on' => 'bool',
        //        'chromatograph_is_open'    => 'bool',
        //        'chromatograph_replaced'   => 'bool',
        //        'chromatograph_pump'       => 'bool',
        //        'chromatograph_injector'   => 'bool',
        'check_values'          => 'json',
        'chromatograph_values'  => 'json',
        'is_lock_index'         => 'bool',
        'is_lock_storage'       => 'bool',
        'is_lock_weighting'     => 'bool',
        'is_lock_cooking'       => 'bool',
        'is_lock_chromatograph' => 'bool',

        'chromatograph_status_installed_jars'   => ChromatographStatusInstalledJars::class,
        'chromatograph_status_turn_on'          => ChromatographStatusTurnOn::class,
        'chromatograph_status_flush_valve'      => ChromatographStatusFlushValve::class,
        'chromatograph_status_pump'             => ChromatographStatusPump::class,
        'chromatograph_status_columns'          => ChromatographStatusColumns::class,
        'chromatograph_status_soft_ware'        => ChromatographStatusSoftWare::class,
        'chromatograph_status_introduce_sample' => ChromatographStatusIntroduceSample::class,
        'chromatograph_status_entries'          => ChromatographStatusEntries::class,

        'chromatograph_column_temp' => 'float',
        'chromatograph_flow_speed'  => 'float',
        'chromatograph_detector'    => 'int',
        'chromatograph_value'       => 'int',
    ];


    public function sessionComponents()
    {
        return $this->hasMany(SessionComponent::class, 'session', 'uuid');
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

//    public function getChromatographValue(string $key): mixed
//    {
//        return $this->chromatograph_values[$key] ?? null;
//    }

//    public function saveChromatographValues(array $values): void
//    {
//        $this->update([
//            'chromatograph_values' => $values
//        ]);
//    }


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

    public function isCookingRoomUnlocked(): bool
    {
        return !$this->isCookingRoomLocked();
    }

    public function isChromatographRoomLocked(): bool
    {
        return $this->isLockStage(Stage::chromatograph);
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

    public function checkChromatographRoomAbleUnlock(): bool
    {
        $cookingComponentIds = $this->laboratory->cookingComponents()->pluck('component_id', 'id')->toArray();
        $sessionComponentIds = $this->sessionComponents()
            ->where('type', '!=', SessionComponentType::Simple)
            ->whereIn('component_id', $cookingComponentIds)
            ->pluck('component_id', 'id')->toArray();
        foreach ($sessionComponentIds as $sessionComponentId) {
            foreach ($cookingComponentIds as $cookingComponentKey => $cookingComponentId) {
                if ($sessionComponentId == $cookingComponentId) {
                    unset($cookingComponentIds[$cookingComponentKey]);
                }
            }
        }

        return count($cookingComponentIds) == 0;
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

    public function checkChromatographRoomLock(): void
    {
        if (
            $this->isCookingRoomUnlocked() &&
            $this->isChromatographRoomLocked() &&
            $this->checkChromatographRoomAbleUnlock()
        ) {
            $this->unlockStage(Stage::chromatograph);
        }
    }

    public function checkChromatographValues(): void
    {
        if ($this->isChromatographValuesRight()) {
            $this->setChromatographStatusIntroduceSampleIntroduce();
        }
    }

    public function isChromatographValuesRight(): bool
    {

        return $this->chromatograph_column_temp == $this->laboratory->chromatograph_column_temp &&
            $this->chromatograph_flow_speed == $this->laboratory->chromatograph_flow_speed &&
            $this->chromatograph_detector == $this->laboratory->chromatograph_detector &&
            $this->chromatograph_value == $this->laboratory->chromatograph_value;
    }

    public function getChromatographBackground(): string
    {
//        if ($this->isFlushValueOpenBackground()) {
//            return 'chromatograph_flush_valve_open.jpg';
//        }
//        if ($this->isInstalledOneJarsBackground()) {
//            return 'chromatograph_installed_one.jpg';
//        }
//        if ($this->isInstalledTwoJarsBackground()) {
//            return 'chromatograph_installed_one.jpg';
//        }

        return 'chromatograph_default.jpg';
    }
}
