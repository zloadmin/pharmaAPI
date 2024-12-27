<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PharmacologicalArticle extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getFileUrlAttribute(): string
    {
        return Storage::url($this->path);
    }

    public static function getDropdownArray(): array
    {
        return self::query()->pluck('name', 'id')->toArray();
    }

}
