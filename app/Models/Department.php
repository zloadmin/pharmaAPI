<?php

namespace App\Models;

use App\Http\Requests\Department\StoreDepartmentRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teachers() : HasMany
    {
        return $this->hasMany(Teacher::class, 'department_id', 'id');
    }

    public static function createFromStoreDepartmentRequest(StoreDepartmentRequest $request): self
    {
        return self::create(['name' => $request->name]);
    }

    public function updateFromStoreDepartmentRequest(StoreDepartmentRequest $request): void
    {
        $this->update(['name' => $request->name]);
    }
}
