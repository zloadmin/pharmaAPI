<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    ];

    static function start(): string
    {
        return self::create([
            'user_id' => 1, // TODO: After auth
            'uuid'    => Str::uuid()
        ])->uuid;
    }
}
