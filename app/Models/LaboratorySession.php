<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LaboratorySession extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function start(): string
    {
        return self::create([
            'user_id' => 1, // TODO: After auth
            'uuid'    => Str::uuid()
        ])->uuid;
    }
}
