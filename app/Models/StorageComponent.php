<?php

namespace App\Models;

use App\Enums\StorageComponent\StorageComponentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StorageComponent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'type' => StorageComponentType::class
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }
}
