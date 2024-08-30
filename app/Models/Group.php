<?php

namespace App\Models;

use App\Http\Requests\Group\StoreGroupRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function createFromStoreUserRequest(StoreGroupRequest $request): self
    {
        $group = Group::create([
            'name'        => $request->name,
            'description' => $request->description,
            'teacher_id'  => $request->teacher_id,
        ]);
        if ($request->has('students')) {
            $group->students()->attach($request->get('students'));
        }
        return $group;
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'group_students')->withPivot('created_at');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function updateFromUpdateUserRequest(StoreGroupRequest $request): void
    {
        $this->update([
            'name'        => $request->name,
            'description' => $request->description,
            'teacher_id'  => $request->teacher_id,
        ]);
        if ($request->has('students')) {
            $this->students()->sync($request->get('students'));
        }
    }
}
