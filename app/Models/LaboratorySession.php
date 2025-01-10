<?php

namespace App\Models;

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

    ];

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function getChromatographValue(string $key): mixed
    {
        return $this->chromatograph_values[$key] ?? null;
    }
    public function saveChromatographValues(array $values) : void
    {
        $this->update([
            'chromatograph_values' => $values
        ]);
    }


    static function start(): string
    {
        return self::create([
            'user_id'       => 1, // TODO: After auth
            'uuid'          => Str::uuid(),
            'laboratory_id' => Laboratory::find(1)->id
        ])->uuid;
    }
}
