<?php

namespace App\Models;

use App\Enums\StorageComponent\StorageComponentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageComponent extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => StorageComponentType::class
    ];
}
