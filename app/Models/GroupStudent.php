<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime'
    ];
}
